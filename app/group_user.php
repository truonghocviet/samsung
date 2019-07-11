<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_user extends Model
{
    //
    protected $table = "group_user";

    public function user()
    {
    	return $this->hasMany('App\User', 'id_group_user', 'id');
    }

    public function error()
    {
    	return $this->hasManyThrough('App\error', 'App\User', 'id_group_user', 'id_user', 'id');
    }

}
