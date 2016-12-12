<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Ip;
use App\ActiveAccount;
use App\Teacher;
use App\Student;
class AuthenController extends Controller
{
    private function check_captcha($ip_address) 
    {
        $captcha = false;
        if(Ip::get_num_fails($ip_address)['num_fails'] >= 20){
            $captcha = true;
        }
        return $captcha;
    }

    public function index(Request $request) 
    {
        $captcha = $this->check_captcha($request->ip());
        return view($this->view_login)->with(['check_captcha'=>$captcha]);
    }

    public function redirect_login()
    {
        return redirect()->route($this->route_login);
    }

    protected function login(Request $request)
    {
        $ip_address = $request->ip();   
        $check_captcha = $this->check_captcha($ip_address);
        if($check_captcha){
            // check captcha first
            $rules = [
                'captcha' => 'required|captcha',
            ];

            $messages = [
                'captcha.required' => 'bạn chưa nhập mã bảo vệ !',
                'captcha.captcha' => 'mã bảo vệ không chính xác !',
            ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if($validate->fails()){
                return redirect()->route($this->route_login)->withErrors($validate)->withInput();
            }
        }
        
        $rules = [
            'username' => 'required|exists:'.$this->table_database.','.$this->column_user.'',
            'password' => 'required',
        ];

        $messages = [
            'username.required' => 'Bạn chưa nhập tên tài khoản !',
            'username.exists' => 'Tài khoản hoặc mật khẩu không đúng!',
            'password.required' => 'bạn chưa nhập mật khẩu !',
        ];

        $validate = Validator::make($request->all(),$rules,$messages);

        if($validate->fails()){
            Ip::new_ip($request);
            Ip::increment_num_fail($ip_address);
            return redirect()->route($this->route_login)->withErrors($validate)->withInput();
        }
        else {
            $check = false;
            if($this->guard == 'teachers'){
                $vnu_email = $request->vnu_email;
                $check = true;
            }
            if($this->guard == 'students'){
                $vnu_email = Student::where('code',$request->username)->first()->vnu_email;
                $check = true;
            }

            if($check){
                $check = ActiveAccount::where('vnu_email',$vnu_email)->count();
                if($check){
                    return redirect()->route($this->route_login)->withErrors(['username'=>'Tài khoản này chưa được kích hoạt ! vui lòng truy cập địa chỉ email để lấy đường dẫn kích hoạt tài khoản !'])->withInput();
                }
            }
            if(Auth::guard($this->guard)->attempt([
                $this->column_user => $request->username, 
                'password' => $request->password],
                $request->remember == 1 ? true : false)){

                return redirect()->route($this->auth_dashboard);
            }
            else {
                
                Ip::new_ip($request);
                Ip::increment_num_fail($ip_address);
                return redirect()->route($this->route_login)
                ->withErrors(['username'=>'Tên đăng nhập hoặc mật khẩu không đúng'])
                ->withInput();
            }
        }
    }
}
