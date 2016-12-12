<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveAccount extends Model
{
    protected $table = 'active_accounts';
     protected $fillable = ['token','vnu_email'];
    public $timestamps = true;
}
