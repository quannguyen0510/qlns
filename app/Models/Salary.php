<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    public  $timestamps = false;
    protected $fillable = ['id_user','year','month','day_worked','bonus_project','total','checklist'];

    public function salaries()
    {
        return $this->belongsTo(Account::class, 'id_user', 'id');
    }
}
?>
