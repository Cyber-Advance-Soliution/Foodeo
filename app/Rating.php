<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Rating extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class,'product_id');
    }
}
