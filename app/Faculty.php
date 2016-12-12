<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Faculty extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='faculties';
    
    protected $fillable = [
        'username',
        'password',
        'code',
        'name',
        'vnu_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
