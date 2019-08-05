<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    public  $timestamps = false;
    protected $fillable = ['role','fixed_salary'];
  
    public function users() {
        return $this->hasMany(Account::class, 'id_role', 'id');
    }
}
?>
