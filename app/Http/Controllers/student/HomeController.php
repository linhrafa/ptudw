<?php
/**
 * Created by PhpStorm.
 * User: Duong Td
 * Date: 18/11/2016
 * Time: 1:34 CH
 */
namespace App\Http\Controllers\student;

use App\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        //lấy ra sinh viên
        $id = (Auth::guard('students')->id());
        $students = Student::where('id', $id)->get();
        $student = $students->first();



        //truyền vào view
        $data = array(
            'student' => $student

        );
        //dd("duong");
        return view('student.dashboard', compact('data'));
    }
}