<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    public function salaries() {
        return $this->hasMany('App\User', 'id_user', 'id');
    }
}
