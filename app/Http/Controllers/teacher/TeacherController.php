<?php

namespace App\Http\Controllers\teacher;

use App\Faculty;
use App\Teacher;
use App\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function update()
    {
        return view('teacher.update');
    }

    public static function index()
    {

    }

}
