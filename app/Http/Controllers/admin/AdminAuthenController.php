<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Auth\AuthenController;

class AdminAuthenController extends AuthenController
{
    public function __construct()

    {
        $this->route_login = 'admin.login';
        $this->table_database = 'admin';
        $this->auth_dashboard = 'admin.dashboard';
        $this->guard = 'admins';
        $this->view_login = 'auth.login';
        $this->column_user = 'username';
        $this->middleware('guest_admin');
    }
}

