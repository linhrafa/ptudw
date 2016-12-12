<?php
namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Auth\AuthenController;

class TeacherAuthenController extends AuthenController
{
    public function __construct()

    {
        $this->route_login = 'teacher.login';
        $this->table_database = 'teachers';
        $this->auth_dashboard = 'teacher.dashboard';
        $this->guard = 'teachers';
        $this->view_login = 'auth.login';
        $this->column_user = 'vnu_email';
        $this->middleware('guest_teacher');
    }

}

