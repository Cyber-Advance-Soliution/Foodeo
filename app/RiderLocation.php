<?php

namespace App;
use App\Rider;
use Illuminate\Database\Eloquent\Model;

class RiderLocation extends Model
{
    public function rider()
    {
        return $this->hasOne(Rider::class,'rider_id');
    }
}
