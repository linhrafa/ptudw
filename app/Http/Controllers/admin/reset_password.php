<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthResetPassword;
class reset_password extends AuthResetPassword
{
    function __construct()
    {
    	$this->guard = 'admin';
    	$this->db_table = 'admin';
    	$this->domain_name = 'http://admin.thesis.manager.dev';
    }
}
