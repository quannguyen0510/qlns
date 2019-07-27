<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title', 'content', 'posted_by', 'created_at'];
    public  $timestamps = false;

    public function comments() {
        return $this->hasMany(Comment::class, 'id_news', 'id');
    }

    public function users() {
        return $this->belongsTo(Account::class, 'posted_by', 'id');
    }
}
?>

