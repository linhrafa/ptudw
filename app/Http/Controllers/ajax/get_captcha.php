<?php

namespace App\Http\Controllers\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class get_captcha extends Controller
{
    function index(Request $request){
    	return (json_encode('dfd'));
    }
}
