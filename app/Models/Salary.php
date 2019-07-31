<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    public  $timestamps = false;
    
    public function salaries() {
        return $this->hasMany(Account::class, 'id_user', 'id');
    }
}
?>
