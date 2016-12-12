<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'teachers';
    protected $fillable = ['vnu_email','password','code','name','degree','area_research','id','department_id','associate_dean_faculty_id'];

    protected $guard = "teachers";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    public $timestamps = true;

}
