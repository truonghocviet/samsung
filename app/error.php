<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class error extends Model
{
    //
	protected $table = "error";

	public function user()
	{
		return $this->belongsTo('App\User','id_user','id');
	}

	public function customer()
	{
		return $this->belongsTo('App\customer','id_customer','id');
	}
	public function product()
	{
		return $this->belongsTo('App\product','id_product','id');
	}
}
