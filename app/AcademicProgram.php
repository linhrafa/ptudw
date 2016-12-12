<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    protected $table = 'academic_programs';
    protected $fillable = ['id','name','time_study'];

    protected $hidden = [];

    public $timestamps = true;
}
