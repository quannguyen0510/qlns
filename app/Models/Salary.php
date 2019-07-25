<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    public  $timestamps = false;
    //
    public function salaries() {
        return $this->hasMany('App\User', 'id_user', 'id');
    }
}
