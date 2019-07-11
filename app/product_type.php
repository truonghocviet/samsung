<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_type extends Model
{
    //
    protected $table = "product_type";

    public function product()
    {
    	return $this->hasMany('App\product','id_product_type','id');
    }

}
