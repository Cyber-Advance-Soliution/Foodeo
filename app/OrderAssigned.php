<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class OrderAssigned extends Model
{
    protected $table = 'order_assigned';
	
	protected $appends = ['customer_id'];
	
	protected $fillable = [
		'rider_id',
		'order_id',
	];
	
	protected $hidden = ['customer_id'];
	
	public function order()
	{
		return $this->belongsTo('App\Order', 'order_id', 'id')->with('orderProducts');
	}
	
	public function rider()
	{
		return $this->belongsTo('App\Rider', 'rider_id');
	}
	
	public function getCustomerIdAttribute()
	{
		return $this->order->customer_id;
	}
	
	public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id', 'u_id');
		
	}
}
