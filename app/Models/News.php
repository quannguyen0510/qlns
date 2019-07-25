<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'id_news', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'posted_by', 'id');
    }
}
