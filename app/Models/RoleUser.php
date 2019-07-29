<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";
    public  $timestamps = false;

    public function roles() {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function users() {
        return $this->belongsTo(Account::class, 'id_user', 'id');
    }
}
?>
