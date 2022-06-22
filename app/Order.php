<?php

namespace App;

use SiteHelper;
use App\PickupStatusList;
use App\DeliveryStatusList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
	use Notifiable;
	
    protected $primaryKey = 'id';
	
	protected $table = 'orders';
	
	protected $appends = ['order_reference'];
	
	protected $fillable = [
        'store_id',
        'customer_id',
		'delivery_charges',
		'discount',
		'walletPayment',
		'coupon',
		'coupon_id',
		'sub_total',
		'grand_total',
		'home_delivery',
		'cash_on_delivery',
		'pickup',
		'payment_method',
		'payment_method_id',
		'latitude',
		'longitude',
		'customer_address',
	];
	
	public function getOrderReferenceAttribute()
	{
		$orderId = $this->id;
		return SiteHelper::orderReference($orderId);
	}

	public function store()
	{
		return $this->belongsTo('App\Store', 'store_id');
	}
	
	public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id', 'u_id');
	}
	
	public function orderType()
	{
		return $this->belongsTo('App\OrderType', 'order_type_id');
	}
	
	public function getOrderStatusAttribute()
	{
		$orderStatus = '';
		
		if($this->pickup == 1 && $this->status > 0)
		{
			$statusModel = PickupStatusList::where('id', $this->status)->first();
			$orderStatus = isset($statusModel) ? $statusModel->name : '' ;
		} elseif ($this->home_delivery == 1 && $this->status > 0){
			$statusModel = DeliveryStatusList::where('id', $this->status)->first();
			$orderStatus = isset($statusModel) ? $statusModel->name : '' ;
			// $orderStatus = isset($statusModel) ? $statusModel->name : '' ;
		} else {
			$orderStatus = 'Pending';
		}
		
		return $orderStatus;
		
	}
	
	public function orderProducts()
	{
		return $this->hasMany('App\OrderProduct', 'order_id', 'id');
	}
	public function orderAssigned()
	{
		return $this->hasone('App\OrderAssigned', 'order_id', 'id');
	}


}
