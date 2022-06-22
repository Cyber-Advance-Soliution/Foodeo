<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'order_types';
}
