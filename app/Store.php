<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $primaryKey = 'id';
	
	protected $table = 'stores';
	
	public $timestamps = false;

	protected $fillable = [
        'store_name',
        'store_email',
        'store_contact',
        'created_by',
        'store_category_id',
        'store_type_id',
        'cash_on_delivery',
        'customer_pickup',
        'delivery_to_customer',
		'delivery_charges',
		'short_description',
		'long_description',
		'latitude',
		'longitude',
		'store_thumbnail',
		'status',
	];
	
	public function getVisibilityStatusAttribute()
	{
		$html = '';
		if($this->visible_status == 1) {
			$html .= 'Visible';
		} else {
			$html .= 'Hidden';
		}
		return $html;
	}
	
	public function storeType()
	{
		return $this->belongsTo('App\StoreType', 'store_type_id');
	}
	
	public function getStoreCategoryAttribute()
	{
		$html = '';
		if($this->store_category_id) {
			$storeCategory = StoreCategory::where(['id' => $this->store_category_id])->first();
			$html .= $storeCategory->category_name;
		} 
		
		return $html;
	}
	
	public function getStatusAttribute($value)
	{
		$html = '';
		if($value == 1) {
			$html .= 'Active';
		} else {
			$html .= 'Pending';
		}
		return $html;
	}
	
	public function storeBanners()
	{
		return $this->hasMany('App\StoreBanner', 'store_id', 'id');
	}
	
	public function productCategories()
	{
		return $this->hasMany('App\ProductCategory', 'store_id', 'id');
	}
	
	public function products()
	{
		return $this->hasMany('App\Product', 'store_id', 'id');
	}
}
