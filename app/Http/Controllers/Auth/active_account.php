<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActiveAccount;
class active_account extends Controller
{
    public function index($token)
    {
    	$query = ActiveAccount::where('token',$token);
    	if($query->count()){
            $vnu_email = $query->first()->vnu_email;
            $query->delete();
    		return view('Auth.ActiveAccount')->with(['vnu_email'=> $vnu_email]);
    	}
    	else {
    		return view('auth.error_token');
    	}
    }
}
