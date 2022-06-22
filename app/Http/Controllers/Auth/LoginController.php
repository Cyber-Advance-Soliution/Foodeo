<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	protected function credentials(Request $request) {
		return array_merge($request->only($this->username(), 'password'), 
			[
				'status' => 1
			]
		);
	}
	
	public function redirectTo(){
		
		$role = Auth::user()->role; 
		
		switch ($role) {
			case 1:
				return 'admin/dashboard';
				break;
			case 2:
				return '/staff-dashboard';
				break; 
			default:
				return '/login'; 
			break;
		}
	}
}
