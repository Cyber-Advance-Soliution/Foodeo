<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'product_categories';
	
	public $timestamps = false;

	protected $fillable = [
        'category_name',
        'created_by',
        'store_id',
        'category_icon',
    ];
	
	public function products()
	{
		return $this->hasMany('App\Product', 'product_category_id', 'id');
	}
	
	public function store()
	{
		return $this->belongsTo('App\Store', 'store_id');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User', 'created_by');
	}
}
