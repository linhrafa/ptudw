<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $table = 'ip_fails';

    protected $fillable = ['ip_address','user_agent','num_fails'];

    protected $hidden = [];

    public $timestamps = false;

    public static function new_ip($request){
        $ip_address = $request->ip();
        if(Ip::select('id')->where('ip_address',$ip_address)->first() != null){
            return;
        }
    	return Ip::create([
            'ip_address' => $ip_address,
            'user_agent' => $request->header('User-Agent'),
            'num_fails' => 0,
        ]);
    }

    public static function increment_num_fail($ip_address){
    	return Ip::where('ip_address',$ip_address)->increment('num_fails');
    }

    public static function get_num_fails($ip_address){
    	return Ip::select('num_fails')->where('ip_address',$ip_address)->first();
    }
}
