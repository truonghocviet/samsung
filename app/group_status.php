<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_status extends Model
{
    //
    protected $table = "group_status";

    public function product()
    {
    	return $this->hasMany('App\product','id_group_status','id');
    }

}
