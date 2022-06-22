<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'customers';
	
	protected $guard = 'customer';
	
	//protected $appends = ['customer_id', 'phone_number'];
	//protected $appends = ['phone_number'];

    protected $fillable = [
        'username', 
        'u_id', 
        'device_token', 
		'role', 
		'is_facebook_id', 
		'is_google_id', 
		'google_token_id', 
		'email', 
		'password',
		'code',
		'phone_verify_status',
		'customer_address',
		'phone_number',
		'latitude',
		'longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
		'remember_token', 
		'role', 'phone_verify_at', 
		'phone_verify_status', 
		'code', 
		'email_verified_at',
		'google_token_id',
		'facebook_token_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function customerDetail()
	{
		return $this->hasOne('App\CustomerDetail', 'customer_id');
	}
	public function orderComplaint()
	{
		return $this->hasMany('App\OrderCompliant', 'OrderCompliant_id');
	}
	
	// public function getPhoneNumberAttribute()
	// {
		// return $this->customerDetail->phone_number;
	// }
	
	// public function getCustomerIdAttribute()
	// {
		// return $this->customerDetail->customer_id;
	// }
	
	public function getIsFacebookIdAttribute($value)
	{
		if($value == 1) {
			return true;
		}
		
		return false;
	}
	
	public function getIsGoogleIdAttribute($value)
	{
		if($value == 1) {
			return true;
		}
		
		return false;
	}
	
	// public function wallet()
	// {
	// 	return $this->hasMany('App\Wallet', 'customer_id','u_id');
	// }
	public function wallet()
	{
		return $this->hasMany('App\Wallet', 'customer_id','u_id');
	}
}
