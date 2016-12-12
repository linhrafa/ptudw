<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Auth\LogoutController;

class StudentLogoutController extends LogoutController
{
    public function __construct(){
    	$this->guard = 'students';
    }
}

?>