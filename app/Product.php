<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'products';
	
	protected $fillable = [
		'store_id',
		'created_by',
		'product_name',
        'product_price',
		'long_description',
		'product_thumbnail',
		'short_description',
		'product_category_id',
    ];
	
	public function productBanners()
	{
		return $this->hasMany('App\ProductBanner', 'product_id', 'id');
	}
	
	public function productAttributes()
	{
		return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
	}
	
	public function store()
	{
		return $this->belongsTo('App\Store', 'store_id');
	}
	public function rating()
	{
		return $this->belongsTo('App\Rating','rating_id');
	}
}
