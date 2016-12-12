<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\PasswordReset;
use App\Faculty;
use App\Admin;
use App\Teacher;
use App\Student;
use App\Http\Controllers\Controller;
include 'lib.php';

class AuthResetPassword extends Controller
{
    public function index()
    {
    	return view('Auth.reset_password');
    }
    public function send_email(Request $request)
    {
    	$rules = [
    		'captcha' => 'required|captcha',
    	];

    	$messages = [
    		'captcha.required' => 'Chưa nhập mã bảo mật !',
    		'captcha.captcha' => 'Mã bảo mật không đúng !',
    	];

    	$validator = Validator::make($request->all(),$rules,$messages);

    	if($validator->fails()){
    		return redirect('/dat-lai-mat-khau')->withErrors($validator)->withInput();
    	}
    	else {
    		$rules = [
	    		'vnu_email' => 'required|exists:'.$this->db_table.',vnu_email',
	    	];

	    	$messages = [
	    		'vnu_email.required' => 'Bạn chưa nhập email !',
	    		'vnu_email.exists' => 'Email không tồn tại trong hệ thống !',
	    	];

	    	$validator = Validator::make($request->all(),$rules,$messages);
		    if($validator->fails()){
	    		return redirect('/dat-lai-mat-khau')->withErrors($validator)->withInput();
	    	}
	    	else {
	    		$vnu_email = $request->vnu_email;
	    		$check_exists = PasswordReset::where('vnu_email',$vnu_email)->count();
	    		$token = random_password(100);
	    		//nếu chưa có token thì insert
	    		if($check_exists == 0){
	    			PasswordReset::create([
	    				'token' => $token,
	    				'vnu_email' => $vnu_email,
	    			]);
	    		}
	    		//nếu có thì update token mới
	    		else {
	    			PasswordReset::where('vnu_email',$vnu_email)->update(['token'=>$token]);
	    		}
    			Mail::to($vnu_email)->send(new ResetPassword(
    				$vnu_email,
    				$this->domain_name.'/protected/resetpassword/'.$token
    			));

    			return view('Auth.complete_send_email')->with(['vnu_email'=>$vnu_email]);
	    	}
    	}

    }



    protected function index_reset($token)
    {
    	if(PasswordReset::where('token',$token)->count()){
    		return view('Auth.ResetPassword');
    	}
    	else {
    		return view('auth.error_token');
    	}
    }

    protected function reset_password(Request $request, $token)
    {
    	$object = PasswordReset::where('token',$token)->first();
    	if($object->count()){
    		$rules = [
	    		'captcha' => 'required|captcha',
	    	];

	    	$messages = [
	    		'captcha.required' => 'Chưa nhập mã bảo mật !',
	    		'captcha.captcha' => 'Mã bảo mật không đúng !',
	    	];

	    	$validator = Validator::make($request->all(),$rules,$messages);

	    	if($validator->fails()){
	    		return redirect()->back()->withErrors($validator)->withInput();
	    	}
	    	else {
	    		$rules = [
		    		'password' => 'required|alpha_dash|min:6|max:255',
		    		're_password' => 'required|same:password'
		    	];

		    	$messages = [
		    		'password.required' => 'Bạn chưa nhập mật khẩu mới !',
		    		'password.alpha_dash' => 'mật khẩu không được chứa kí tự đặc biệt !',
		    		'password.min' => 'mật khẩu từ 6 kí tự !',
		    		're_password.required' => 'Bạn chưa nhập lại mật khẩu !',
		    		'password.required' => 'Mật khẩu không khớp !',
		    	];

		    	$validator = Validator::make($request->all(),$rules,$messages);
			    if($validator->fails()){
		    		return redirect()->back()->withErrors($validator)->withInput();
		    	}
		    	else {
		    		PasswordReset::where('token',$token)->delete();
		    		$password = bcrypt($request->password);
		    		switch ($this->db_table) {
		    			case 'teachers':
		    				Teacher::where('vnu_email',$object->vnu_email)->update(['password'=>$password]);
		    				break;
		    			case 'faculties':
		    				Faculty::where('vnu_email',$object->vnu_email)->update(['password'=>$password]);
		    				break;
		    			case 'admins':
		    				Admin::where('vnu_email',$object->vnu_email)->update(['password'=>$password]);
		    				break;
		    			case 'students':
		    				Student::where('vnu_email',$object->vnu_email)->update(['password'=>$password]);
		    				break;
		    			default:
		    				# code...
		    				break;
		    		}

		    		return redirect('login')->withErrors(['reset_password'=>'Thay đổi mật khẩu thành công !']);
		    	}
	    	}
    	}
    }
}
