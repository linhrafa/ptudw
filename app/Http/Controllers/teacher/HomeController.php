<?php
/**
 * Created by PhpStorm.
 * User: Duong Td
 * Date: 07/11/2016
 * Time: 3:34 CH
 */
namespace App\Http\Controllers\teacher;

use App\Faculty;
use App\Teacher;
use App\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //hiển thị view chỉnh sửa
    public function viewUpdateInfo()
    {
        $id = (Auth::guard('teachers')->id());
        $teachers = Teacher::where('id', $id)->get();
        $teacher = $teachers->first();
        return view('teacher.updateInfo', compact('teacher'));
    }

    //cập nhập vào db
    public function updateInfo(Request $request){
        $degree = $request->degree;
        $area_research = $request->area_research;
        DB::table('teachers')->update(['degree'=>$degree,'area_research'=>$area_research]);
        //trở về view dashboard
        return redirect()->route('teacher.dashboard');
    }

    public function index()
    {
        //lấy ra giảng viên
        $id = (Auth::guard('teachers')->id());
        $teachers = Teacher::where('id', $id)->get();
        $teacher = $teachers->first();

        //lấy ra bộ môn, khoa của GV
        $dept = Department::where('id', $teacher->department_id)->get()->first();
        $faculty = Faculty::where('id', $dept->faculty_id)->get()->first();

        //truyền vào view
        $data = array(
            'teacher' => $teacher,
            'dept' => $dept,
            'faculty' => $faculty
        );
        return view('teacher.dashboard', compact('data'));
    }
}