<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function group_user()
    {
       return $this->belongsTo('App\group_user', 'id_group_user', 'id');
    }

    public function error()
    {
        return $this->hasMany('App\error', 'id_user', 'id');
    }
}
