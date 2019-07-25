<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{
    //
    protected $table = "day_offs";
    public  $timestamps = false;

    public function users() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
