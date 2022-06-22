<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'id';
	
	protected $table = 'employees';
	
	protected $fillable = [
        'name',
        'role',
        'username',
        'email',
        'password',
		'phone_number',
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
}
