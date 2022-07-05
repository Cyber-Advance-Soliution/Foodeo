<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        if (Auth::guard('superadmin')->attempt(['email' => $request['email'], 'password' => $request['password']], $request->get('remember'))) {
            return redirect('dashboard');
        }

        return redirect('admin-foodeo');
    }
}
