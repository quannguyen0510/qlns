<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{
    protected $table = "day_offs";
    public  $timestamps = false;

    public function users() {
        return $this->belongsTo(Account::class, 'id_user', 'id');
    }
}
?>
