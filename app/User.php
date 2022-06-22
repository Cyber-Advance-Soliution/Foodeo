<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function userDetail()
	{
		return $this->hasOne('App\UserDetail', 'user_id' , 'id');
	}
	
	public function getOwnerStatusAttribute()
	{
		$ownerStatus = '';
		if($this->status == 1) {
			$ownerStatus = 'Active';
		} else {
			$ownerStatus = 'Not Active';
		}
		return $ownerStatus;
	}
}
