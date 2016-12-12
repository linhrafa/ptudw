<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Auth\LogoutController;

class AdminLogoutController extends LogoutController
{
    public function __construct(){
    	$this->guard = 'admins';
    }
}

?>