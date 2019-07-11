<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = "customer";

    public function error()
    {
    	return $this->hasMany('App\error', 'id_customer', 'id');
    }
}
