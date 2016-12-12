<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthResetPassword;
class reset_password extends AuthResetPassword
{
    function __construct()
    {
    	$this->guard = 'students';
    	$this->db_table = 'students';
    	$this->domain_name = 'http://thesis.manager.dev';
    }
}
