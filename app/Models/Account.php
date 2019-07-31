<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "users";
    public  $timestamps = false;
    protected $fillable = [
        'name', 'email', 'password','phone'
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'id_user', 'id');
    }

    public function news() {
        return $this->hasMany(News::class, 'posted_by', 'id');
    }

    public function userRoles() {
        return $this->hasMany(RoleUser::class, 'id_user', 'id');
    }

    public function dayoffs() {
        return $this->hasMany(DayOff::class, 'id_user', 'id');
    }

    public function salaries() {
        return $this->belongsTo(Salary::class, 'id_user', 'id');
    }
}
?>
