<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthChangePassword;
class ChangePassword extends AuthChangePassword
{
    public function __construct()
    {
    	$this->change_password_view = 'faculty.change_password';
    }
}
