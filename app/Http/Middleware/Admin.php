<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Admin
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
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;
            $assignedPermissions = $user->getAllPermissions();
            $userPermissions = [];
            foreach ($assignedPermissions as $name) {
                array_push($userPermissions, $name->name);
            }

            $route = Route::current()->getName();

            if ($role == 1) {
                return $next($request);
            }
            if ($role == 2 || $user->hasAnyPermission($userPermissions)) {
                if (Request::is('admin/dashboard')) {
                    return redirect('/');
                } else if (in_array($route, $userPermissions)) {
                    return $next($request);
                }
            }
        }

        return redirect('/');
    }
}
