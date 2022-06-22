<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
	protected $table = 'product_attributes';
	
	public $timestamps = false;
	
	protected $fillable = [
        'attribute_name',
        'product_id',
        'options',
    ];
	
	public function getOptionsAttribute($value)
    {
        return unserialize($value);
    }
}
