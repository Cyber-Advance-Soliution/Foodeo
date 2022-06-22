<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'order_products';
	
	protected $appends = ['product_name'];
	
	public $timestamps = false;
	
	protected $fillable = [
        'order_id',
        'product_id',
        'product_price',
        'product_quantity',
        'product_total_price',
        'product_attributes',
	];
	
	public function getProductNameAttribute()
	{
		return $this->product->product_name;
	}
	
	public function getProductAttributesAttribute($value)
    {
        return unserialize($value);
    }
	
	public function product()
	{
		return $this->belongsTo('App\Product', 'product_id');
	}
}
