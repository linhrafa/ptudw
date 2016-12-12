<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    protected function logout(){
    	Auth::guard($this->guard)->logout();
    	return redirect('/login');
    }
}

?>