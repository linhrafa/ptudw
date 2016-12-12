<?php

namespace App\Http\Controllers\admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
class NewFaculty extends Controller
{
    public function index()
    {
    	return view('admin.new_faculty');
    }

    public function new_faculty(Request $request)
    {	
    	$rules = [
    		'name' => 'required',
    		'email' => 'required|email|unique:faculties,vnu_email',
    		'code' => 'required|unique:faculties,code',
    		'username' => 'required|unique:faculties,username',
    		'password' => 'required',
    		're-password' => 'required|same:password',
    	];

    	$messages = [
    		'name.required' => 'Chưa nhập tên !',
    		'email.required' => 'Chưa nhập email !',
    		'email.email' => 'Email sai định dạng !',
    		'email.unique' => 'Email trùng !',
    		'code.required' => 'Chưa nhập mã !',
    		'code.unique' => ' Mã trùng !',
    		'username.required' => 'Chưa nhập tên tài khoản !',
    		'username.unique' => 'Tên tài khoản trùng !',
    		'password.required' => 'Chưa nhập mật khẩu !',
    		're-password.required' => 'Chưa nhập lại mật khẩu !',
    		're-password.same' => 'Nhập lại mật khẩu không chính xác !',
    	];

    	$validator = Validator::make($request->all(),$rules,$messages);

    	if($validator->fails()){
    		return redirect('them-khoa')->withErrors($validator)->withInput();
    	}
    	else {
    		if(Faculty::create([ 
    				'name' => $request->name,
    				'code' => $request->code,
    				'vnu_email' => $request->email,
    				'username' => $request->username,
    				'password' => bcrypt($request->password),
    			])){
    			return view('admin.new_faculty')->with(['success'=> true]);
    		}
    	}
    }
}
