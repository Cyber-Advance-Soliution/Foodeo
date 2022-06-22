<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Store;
use App\Product;
use App\Customer;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
	public function __construct()
    {
       $this->middleware('user');
    }
	
    public function dashboard()
	{
		$owners = User::with('userDetail')->where('role', '=', 1)->count();
		$stores = Store::count();
		$customers = Customer::count();
		$products = Product::count();
		
		return view('user/dashboard', compact('owners', 'stores', 'customers', 'products'));
	}
	
	public function index()
	{
		$model = User::with('userDetail')->where('role', '=', 1)->get();
		
		return view('user/index', compact('model'));
	}
	
	public function create()
	{
		return view('user/create');
	}
	
	public function save(Request $request)
	{
		$createdBy = Auth::guard('superadmin')->user()->id;
		
		$parts = explode("@", $request['email']);
		$username = $parts[0];
		
		$user = [
			'username' => $username,
			'role' => 1,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
 		];
		
		$newUser = User::create($user);
		$userId = $newUser->id;
		
		$newUser->assignRole('admin');
		
		$userDetail = [
			'name' => $request['name'],
			'user_id' => $userId,
			'created_by' => $createdBy,
			'phone_number' => $request['phone_number'],
			'address' => $request['address'],
		];
		
		UserDetail::create($userDetail);
		
		Session::flash('success', 'New admin/owner created successfully');
		
		return redirect('users');
	}
	
	public function edit($id)
	{
		$model = User::with('userDetail')->where(['id' => $id])->first();
		
		return view('user/edit', compact('model'));
	}
	
	public function update(Request $request)
	{
		$userId = $request['user_id'];
		
		$user = [
			'status' => $request['status'],
			'email' => $request['email'],
		];
		
		$userDetail = [
			'user_id' => $userId,
			'name' => $request['name'],
			'phone_number' => $request['phone_number'],
			'address' => $request['address'],
		];
		
		$model = User::where(['id' => $userId])->first();
		if(!empty($model))
		{
			User::where(['id' => $userId])->update($user);
		}
		
		$modelUserDetail = UserDetail::where(['user_id' => $userId])->first();
		
		if(!empty($modelUserDetail))
		{
			UserDetail::where(['user_id' => $userId])->update($userDetail);
		} else {
			UserDetail::create($userDetail);
		}
		
		Session::flash('success', 'Record updated successfully.');
		
		return redirect('users');
	}
}
