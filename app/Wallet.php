<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    

    public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id', 'u_id');
	}
   

}
