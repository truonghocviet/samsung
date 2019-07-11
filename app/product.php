<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = "product";

    public function error()
    {
    	return $this->hasMany('App\error','id_product', 'id');
    }

    public function product_type()
    {
    	return $this->belongsTo('App\product_type','id_product_type', 'id');
    }

    public function group_status()
    {
    	return $this->belongsTo('App\product_type','id_group_status', 'id');
    }

    public function user()
    {
        return $this->hasManyThrough('App\User', 'App\error', 'id_error', 'id_user', 'id');
    }    
}
