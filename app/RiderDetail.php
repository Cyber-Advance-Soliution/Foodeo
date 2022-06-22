<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderDetail extends Model
{
    protected $table = "riders_detail";

    public $timestamps = false;

    protected $fillable = [
		'rider_id',
		'name',
		'phone_number',
		'address',
	];

	public function rider()
	{
		return $this->belongsTo('App\Rider', 'rider_id');
	}

}
