<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthResetPassword;
class reset_password extends AuthResetPassword
{
    function __construct()
    {
    	$this->guard = 'teachers';
    	$this->db_table = 'teachers';
    	$this->domain_name = 'http://teacher.thesis.manager.dev';
    }
}
