<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = 'departments';
    public $fillable = ['id','address','phone','website', 'description', 'name','faculty_id'];

    public $hidden = [];

    public $timestamps = true;

}
