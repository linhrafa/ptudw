<?php

namespace App\Http\Controllers\faculty;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Faculty;
use App\Department;
use App\ActiveAccount;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\Register;
use Illuminate\Support\Facades\Mail;

include_once 'lib.php';

class new_teacher extends Controller
{

	public function index()
    {
        $departments = Department::where('faculty_id',Auth::guard('faculties')->user()->id)->get()->toArray();
		return view('faculty.new_teacher')->with(['departments'=>$departments]);;
	}

    protected function get_department_id($string)
    {   
        $string = text_to_link($string);
        $list_department = Department::select("name","id")->get();

        foreach ($list_department as $key => $value) {
            $name = text_to_link($value->name);
            if(strpos(' '.$string,$name) || strpos(' '.$name,$string)){
                return $value->id;
            }
        }
        return false;

    }

    protected function get_chucvu($string)
    {   
        $string = text_to_link($string);
        if($string == 'pho-khoa'){
            return Auth::guard('faculties')->user()->id;
        }
        else {
            return null;
        }
    }

    protected function update_dean($string, $teacher_id)
    {
        $string = text_to_link($string);
        if($string == 'truong-khoa'){
            return(Faculty::where('id',Auth::guard('faculties')->user()->id)->update(['teacher_dean_id'=>$teacher_id]));
        }
    }
    protected function ajax_new_teacher(Request $request)
    {

        $errors = [];
        $rules = [
            'vnu_email' => 'unique:teachers,vnu_email',
            'code' => 'unique:teachers,code',
        ];
        $messages = [
            'vnu_email.unique' => 'Email giảng viên trùng !',
            'code.unique' => 'Mã giảng viên trùng !',
        ];
        
        $department_id = $this->get_department_id($request->department);

        $validator = Validator::make([
                'code' => $request->code,
                'vnu_email' => $request->vnu_email,
            ],$rules,$messages);

        if($department_id == false){
            $errors[] = 'Bộ môn không tồn tại trong hệ thống !';
        }

        if($department_id == false || $validator->fails()){
            if($validator->errors()->first('vnu_email') != ''){
                $errors[] = $validator->errors()->first('vnu_email');
            }
            if($validator->errors()->first('code') != ''){
                $errors[] = $validator->errors()->first('code');
            }
            $return = ['errors' => $errors];
            return json_encode($return);
        }
        else {
            $password = random_password(15);
            $chucvu = $this->get_chucvu($request->chucvu);
            do {
                $token = random_password(100);
            }
            while(ActiveAccount::where('token',$token)->count() != 0);
            $insert = Teacher::insertGetId([
                'vnu_email' => $request->vnu_email,
                'password' =>  bcrypt($password),
                'code' => $request->code,
                'department_id' => $department_id,
                'name' => $request->name,
                'degree' => $request->degree,
                'associate_dean_faculty_id' => $chucvu,
            ]);

            ActiveAccount::create([
                'vnu_email' => $request->vnu_email,
                'token' => $token,
            ]);

            Mail::to($request->vnu_email)->send(new Register(
                $request->name,
                $request->vnu_email,
                Auth::guard('faculties')->user()->name,
                $password,
                'http://teacher.thesis.manager.dev/protected/active/'.$token
            ));

            $this->update_dean($request->chucvu, $insert);
            return json_encode(['errors'=>'']);
        }
    }

    protected function new_teacher_form(Request $request)
    {
        $errors = [];
        $rules = [
            'vnu_email' => 'required|email|unique:teachers,vnu_email',
            'code' => 'required|unique:teachers,code',
            'name' => 'required',
            'degree' => 'required',
            'department_id' => 'required',
            'chucvu' => 'required',
        ];
        $messages = [
            'vnu_email.required' => 'Chưa nhập email !',
            'vnu_email.email' => 'Email sai định dạng (example@vnu.edu.vn) !',
            'vnu_email.unique' => 'Email đã tồn tại !',
            'code.required' => 'Chưa nhập mã giảng viên !',
            'code.unique' => 'Mã giảng viên đã tồn tại !',
            'department_id.required' => 'Chưa chọn bộ môn !',
            'name.required' => 'Chưa nhập tên giảng viên !',
            'degree.required' => 'Chưa nhập học vị !',
            'chucvu.required' => 'Chưa chọn chức vụ !',
        ];
        
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            $errors['vnu_email'] = $validator->errors()->first('vnu_email');
            $errors['code'] = $validator->errors()->first('code');
            $errors['name'] = $validator->errors()->first('name');
            $errors['department_id'] = $validator->errors()->first('department_id');
            $errors['chucvu'] = $validator->errors()->first('chucvu');
            $errors['degree'] = $validator->errors()->first('degree');
            return json_encode(['errors'=>$errors]);
        }

        else {
            $chucvu = $this->get_chucvu($request->chucvu);
            $password = random_password(15);
            do {
                $token = random_password(100);
            }
            while(ActiveAccount::where('token',$token)->count() != 0);
            $insert = Teacher::create([
                'vnu_email' => $request->vnu_email,
                'password' =>  bcrypt($password),
                'code' => $request->code,
                'department_id' => $request->department_id,
                'name' => $request->name,
                'degree' => $request->degree,
                'associate_dean_faculty_id' => $chucvu,
            ]);

            ActiveAccount::create([
                'vnu_email' => $request->vnu_email,
                'token' => $token,
            ]);

            Mail::to($request->vnu_email)->send(new Register(
                $request->name,
                $request->vnu_email,
                Auth::guard('faculties')->user()->name,
                $password,
                'http://teacher.thesis.manager.dev/protected/active/'.$token
            ));

            return json_encode([]);
        }

    }
}
