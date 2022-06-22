<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBanner extends Model
{
	protected $table = 'product_banners';

	public $timestamps = false;

	protected $fillable = [
        'product_id',
        'banner',
    ];
	
}
