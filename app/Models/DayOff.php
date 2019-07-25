<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{
    //
    public function users() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
