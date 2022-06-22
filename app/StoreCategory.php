<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'store_categories';
	
	protected $fillable = [
        'category_name',
        'category_icon',
    ];
}
