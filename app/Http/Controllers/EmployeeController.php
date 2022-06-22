<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Store;
use App\Employee;
use App\UserDetail;
use App\Designation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class EmployeeController extends Controller
{
	public function __construct()
    {
       $this->middleware('admin');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$model = User::with('userDetail')
				->select('users.*', 'user_detail.created_by')
				->leftJoin('user_detail', 'users.id', '=', 'user_detail.user_id')
				->where(function ($query) {
					$query->where('role', '!=', 1)
						->where('role', '!=', 10)
						->where('user_detail.created_by', \Auth::id());
				})->get();
		
        return view('employee/index', compact('model'));
    }
	
	public function dashboard()
	{
		$model = Auth::user();
		
		return view('employee/dashboard', compact('model'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Auth::user();
		$createdBy = $user->id;
		
		//$permissions = $user->getPermissionsViaRoles(); 
		
		$permissions = Role::findByName('employee')->permissions;
		$designations = Designation::all();
		$stores = Store::where(['created_by' => $createdBy])->get();
		
        return view('employee/create', compact('stores', 'designations', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EmployeeRequest $employeeRequest)
    {
		$createdBy = Auth::user()->id;
		
		$parts = explode("@", $employeeRequest['email']);
		$username = $parts[0];
		
		$user = [
			'username' => $username,
			'role' => 2,
            'email' => $employeeRequest['email'],
            'password' => Hash::make($employeeRequest['password']),
 		];

		$newUser = User::create($user);
		$userId = $newUser->id;
		
		$newUser->assignRole('employee');
		$newUser->givePermissionTo($request->permissions);
		
		$userDetail = [
			'name' => $employeeRequest['name'],
			'user_id' => $userId,
			'store_id' => $employeeRequest['store_id'],
			'created_by' => $createdBy,
			'designation_id' => $employeeRequest['designation_id'],
			'phone_number' => $employeeRequest['phone_number'],
			'address' => $employeeRequest['address'],
		];
		
		UserDetail::create($userDetail);
		
        return redirect()->route('employees')->with('success', 'New employee created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee)
    {
        $employeeId = $request->id;
		
		$model = User::where(['id' => $employeeId])->first();
		
		$assignedPermissions = $model->getAllPermissions();
		
		return view('employee/view', compact('model', 'assignedPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
		$model = User::where(['id' => $request->id])->first();
		$user = Auth::user();
		$createdBy = $user->id;
		
		//$permissions = $user->getPermissionsViaRoles(); 
		$permissions = Role::findByName('employee')->permissions;
		$designations = Designation::all();
		$stores = Store::where(['created_by' => $createdBy])->get();
		
		$assignedPermissions = $model->permissions;
		$userPermissions = [];
		foreach($assignedPermissions as $name)
		{
			array_push($userPermissions, $name->name);
		}
	
        return view('employee/edit', compact('model', 'stores', 'designations', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employeeId = $request->employee_id;
		$createdBy = Auth::user()->id;
		
		$model = User::where(['id' => $employeeId])->first();
		$modelDetail = UserDetail::where(['user_id' => $employeeId])->first();
		
		$parts = explode("@", $request['email']);
		$username = $parts[0];
		
		$user = [
			'username' => $username,
			'role' => 2,
            'email' => $request['email'],
 		];
		
		User::where('id', $employeeId)->update($user);
		
		$userDetail = [
			'name' => $request['name'],
			'user_id' => $employeeId,
			'store_id' => $request['store_id'],
			'created_by' => $createdBy,
			'designation_id' => $request['designation_id'],
			'phone_number' => $request['phone_number'],
			'address' => $request['address'],
		];
		
		UserDetail::where('user_id', $employeeId)->update($userDetail);
		
		$model->syncPermissions($request->permissions);
		
		return redirect()->route('employees')->with('success', 'Employee updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
