<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'user_detail';
	
	public $timestamps = false;
	
	protected $fillable = [
        'name',
		'phone_number',
		'address',
		'user_id',
		'store_id',
		'designation_id',
		'created_by',
    ];
	
	public function designations()
	{
		return $this->hasMany('App\Designation', 'created_by', 'id');
	}
	
	public function designation()
	{
		return $this->belongsTo('App\Designation', 'designation_id');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	public function store()
	{
		return $this->belongsTo('App\Store', 'store_id');
	}
}
