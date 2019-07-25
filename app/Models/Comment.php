<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function news() {
        return $this->belongsTo('App\Models\News', 'id_news', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
