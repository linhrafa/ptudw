<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Auth\AuthenController;

class FacultyAuthenController extends AuthenController
{
    public function __construct()

    {
        $this->route_login = 'faculty.login';
        $this->table_database = 'faculties';
        $this->auth_dashboard = 'faculty.dashboard';
        $this->guard = 'faculties';
        $this->column_user = 'username';
        $this->view_login = 'auth.login';
        $this->middleware('guest_faculty');
    }
}

