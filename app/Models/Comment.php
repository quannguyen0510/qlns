<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    public  $timestamps = false;

    public function news() {
        return $this->belongsTo(News::class, 'id_news', 'id');
    }

    public function users() {
        return $this->belongsTo(Account::class, 'id_user', 'id');
    }
}
?>
