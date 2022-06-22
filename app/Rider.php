<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\RiderLocation;

class Rider extends Authenticatable
{
    protected $table = 'riders';

    protected $guard = 'rider';

    protected $appends = ['name', 'phone_number', 'address'];
    
	protected $hidden = [
		'password',
		'remember_token',
		'updated_at',
	];

    protected $fillable = [
		'created_by',
		'store_id',
		'username',
		'email',
		'password',
	];

	public function riderDetail()
	{
		return $this->hasOne('App\RiderDetail', 'rider_id', 'id');
	}
	
	public function getNameAttribute()
	{
		return $this->riderDetail->name;
	}
	
	public function getAddressAttribute()
	{
		return $this->riderDetail->address;
	}
	
	public function getPhoneNumberAttribute()
	{
		return $this->riderDetail->phone_number;
	}
	
	public function orderAssigned()
	{
		return $this->hasMany('App\OrderAssigned', 'rider_id', 'id');
	}
	
	public function store()
	{
		return $this->belongsTo('App\Store', 'store_id', 'id');
	}
	public function RiderLocation(){
        return $this->belongsTo(RiderLocation::class,'RiderLocation_id');
    
    }
}
