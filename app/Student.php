<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    public $table = 'students';
    public $fillable = ['code','can_do_thesis','is_done_record', 'id', 'password',
        'vnu_email', 'academic_program_id', 'subject_thesis_id','course_id'];

    protected $guard = "students";
    public $hidden = [
        'password', 'remember_token'
    ];

    public $timestamps = true;
}
