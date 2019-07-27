<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = "users";
    public  $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() {
        return $this->hasMay('App\Models\Comment', 'id_user', 'id');
    }

    public function news() {
        return $this->hasMay('App\Models\News', 'posted_by', 'id');
    }

    public function user_role() {
        return $this->hasMay('App\Models\RoleUser', 'id_user', 'id');
    }

    public function dayoffs() {
        return $this->hasMay('App\Models\DayOff', 'id_user', 'id');
    }

    public function salaries() {
        return $this->belongsTo('App\Models\Salary', 'id_user', 'id');
    }
}
