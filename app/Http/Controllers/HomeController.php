<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Controllers\teacher\TeacherController;
use App\Teacher;
use App\Department;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
    	if(Auth::check()){
    		if(Auth::user()->author == 'admin'){
    			return view('admin.home');
	    	}
	    	if(Auth::user()->author == 'faculty'){
	    		return view('faculty.home');
	    	}
	    	if(Auth::user()->author == 'teacher'){
	    	    return TeacherController::index();
	    	}
	    	return view('student.home');
    	}

    	return view('home');
    	
    }
}
