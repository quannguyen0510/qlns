<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public  $timestamps = false;

    public function comments() {
        return $this->hasMany(Comment::class, 'id_news', 'id');
    }

    public function users() {
        return $this->belongsTo(Account::class, 'posted_by', 'id');
    }
}
?>
