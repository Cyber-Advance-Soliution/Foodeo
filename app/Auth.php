<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'auth';
	
	protected $guard = 'superadmin';
	
	protected $hidden = [
		'password', 'remember_token',
	];
}
