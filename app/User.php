<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    protected $table = 'users';
    public $timestamps = false;

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
