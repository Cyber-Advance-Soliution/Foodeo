<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $table = 'customer_details';

	public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 
		'phone_number',
    ];
	
	public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id');
	}
}
