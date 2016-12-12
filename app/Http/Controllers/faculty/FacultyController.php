<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;

class FacultyController extends Controller
{
    public function show_teacher(){
        $teachers = Teacher::all(); 
        return view("faculty.show_teacher")->with('teachers', $teachers);
    }
}
