<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "roles";
    public  $timestamps = false;

    public function user_role() {
        return $this->hasMany('App\Models\RoleUser', 'id_role', 'id');
    }
}
