<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Auth\LogoutController;

class TeacherLogoutController extends LogoutController
{
    public function __construct(){
    	$this->guard = 'teachers';
    }
}
?>