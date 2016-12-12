<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Auth\LogoutController;

class FacultyLogoutController extends LogoutController
{
    public function __construct(){
    	$this->guard = 'faculties';
    }
}

?>