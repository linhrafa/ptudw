<?php
/**
 * Created by PhpStorm.
 * User: Duong Td
 * Date: 17/11/2016
 * Time: 8:45 CH
 */
namespace App\Http\Controllers\faculty;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Faculty;
use App\Department;
use App\AcademicProgram;
use App\Course;
use App\ActiveAccount;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;

include_once 'lib.php';

class new_student extends Controller
{

    public function index()
    {   
        $courses = Course::get()->toArray();
        $academic_programs = AcademicProgram::get()->toArray();

        return view('faculty.new_student')->with(['courses'=>$courses, 'academic_programs'=>$academic_programs]);
    } 

    protected function get_academic_program_id($string)
    {
        $string = text_to_link($string);
        $list_item = AcademicProgram::select("name","id")->get();
        foreach ($list_item as $key => $value) {
            $name = text_to_link($value->name);
            if(1){
                return $value->id;
            }
        }
        return false;
    }

    protected function get_course_id($string)
    {
        $string = text_to_link($string);
        $list_item = Course::select("name","id")->get();

        foreach ($list_item as $key => $value) {
            $name = text_to_link($value->name);
            if(strpos(' '.$string,$name) || strpos(' '.$name,$string)){
                return $value->id;
            }
        }
        return false;
    }

    protected function ajax_new_student(Request $request)
    {
        $errors = [];
        $rules = [
            'vnu_email' => 'unique:students,vnu_email',
            'code' => 'unique:students,code',
        ];
        $messages = [
            'vnu_email.unique' => 'Email sinh viên trùng !',
            'code.unique' => 'Mã sinh viên trùng !',
        ];

        $academic_program_id = $this->get_academic_program_id($request->academic_program);
        $course = $this->get_course_id($request->course);

        $validator = Validator::make([
            'code' => $request->code,
            'vnu_email' => $request->vnu_email,
        ], $rules, $messages);

        if($academic_program_id == false){
            $errors[] = 'Chương trình đào tạo không tồn tại trong hệ thống !';
        }
        if($course == false) {
            $errors[] = 'Khóa học không tồn tại trong hệ thống !';
        }

        if($academic_program_id == false || $course == false || $validator->fails()){
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

            do {
                $token = random_password(100);
            }
            while(ActiveAccount::where('token',$token)->count() != 0);

            $insert = Student::insertGetId([
                'code' => $request->code,
                'vnu_email' => $request->vnu_email,
                'password' => bcrypt($password),
                'academic_program_id' => $academic_program_id,
                'name' => $request->name,
                'course_id' => $course,
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
                'http://thesis.manager.dev/protected/active/'.$token
            ));
            
            return json_encode(['errors' => '']);
        }
    }

    protected function new_student_form(Request $request)
    {
        $errors = [];
        $rules = [
            'vnu_email' => 'required|email|unique:students,vnu_email',
            'code' => 'required|unique:students,code',
            'name' => 'required',
            'course_id' => 'required',
            'academic_program_id' => 'required',
        ];
        $messages = [
            'vnu_email.required' => 'Chưa nhập email !',
            'vnu_email.email' => 'Email sai định dạng (example@vnu.edu.vn) !',
            'vnu_email.unique' => 'Email đã tồn tại !',
            'code.required' => 'Chưa nhập mã sinh viên !',
            'code.unique' => 'Mã sinh viên đã tồn tại !',
            'course_id.required' => 'Chưa chọn khoá học !',
            'name.required' => 'Chưa nhập tên sinh viên !',
            'academic_program_id.required' => 'Chưa chọn chương trình đào tạo !',
        ];
        
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            $errors['vnu_email'] = $validator->errors()->first('vnu_email');
            $errors['code'] = $validator->errors()->first('code');
            $errors['name'] = $validator->errors()->first('name');
            $errors['course_id'] = $validator->errors()->first('course_id');
            $errors['academic_program_id'] = $validator->errors()->first('academic_program_id');
            return json_encode(['errors'=>$errors]);
        }

        else {
            $password = random_password(15);
            do {
                $token = random_password(100);
            }
            while(ActiveAccount::where('token',$token)->count() != 0);
            
            $insert = Student::insertGetId([
                'vnu_email' => $request->vnu_email,
                'password' =>  bcrypt($password),
                'code' => $request->code,
                'course_id' => $request->course_id,
                'name' => $request->name,
                'academic_program_id' => $request->academic_program_id,
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
                'http://thesis.manager.dev/protected/active/'.$token
            ));

            return json_encode([]);
        }

    }
}