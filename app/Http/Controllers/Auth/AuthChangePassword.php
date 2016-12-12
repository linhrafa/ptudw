<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class AuthChangePassword extends Controller
{
    public function index()
    {
    	return view($this->change_password_view);
    }

    protected function validate()
    {
    	$errors = [];
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            're_new_password' => 'required|same:new_password',
        ];
        $messages = [
            'old_password.required' => 'Chưa nhập mật khẩu cũ !',
            'new_password.required' => 'Chưa nhập mật khẩu mới !',
            'new_password.min' => 'Mật khẩu mới từ 6 kí tự !',
            're_new_password.required' => 'Chưa nhập lại mật khẩu mới !',
            're_new_password.same' => 'Nhập lại mật khẩu không khớp !',
        ];
        
        $validator = Validator::make($request->all(),$rules,$messages);

        
    }
}
