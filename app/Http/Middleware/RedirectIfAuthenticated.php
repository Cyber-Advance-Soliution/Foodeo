<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if ($guard == "superadmin" && Auth::guard($guard)->check()) {
			return redirect('/dashboard');
		}
        if (Auth::guard($guard)->check()) {
			$role = Auth::user()->role;
			if($role == 10) {
				return redirect('dashboard');
			}
			if($role == 1) {
				return redirect('admin/dashboard');
			}
			if($role == 2) {
				return redirect('staff-dashboard');
			}
        }

        return $next($request);
    }
}
