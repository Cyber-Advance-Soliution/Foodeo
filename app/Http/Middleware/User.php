<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('superadmin')->check()) {
            $user = Auth::guard('superadmin')->user();
            if ($user) {
                return $next($request);
            }
        }

        return redirect('admin-foodeo');
    }
}
