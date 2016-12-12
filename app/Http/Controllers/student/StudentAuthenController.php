<?php
namespace App\Http\Controllers\student;

use App\Http\Controllers\Auth\AuthenController;

class StudentAuthenController extends AuthenController
{
    public function __construct()

    {
        $this->route_login = 'student.login';
        $this->table_database = 'students';
        $this->auth_dashboard = 'student.dashboard';
        $this->guard = 'students';
        $this->column_user = 'code';
        $this->view_login = 'auth.login';
        $this->middleware('guest_student');
    }
}

