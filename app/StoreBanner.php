<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreBanner extends Model
{
    protected $table = 'store_banners';
	
	public $timestamps = false;
	
	protected $fillable = [
        'store_id',
        'banner',
    ];

}
