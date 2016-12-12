<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthResetPassword;
class reset_password extends AuthResetPassword
{
    function __construct()
    {
    	$this->guard = 'faculties';
    	$this->db_table = 'faculties';
    	$this->domain_name = 'http://faculty.thesis.manager.dev';
    }
}
