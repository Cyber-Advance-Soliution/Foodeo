<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
		
		Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'new-user']);
		
		Permission::create(['name' => 'stores']);
        Permission::create(['name' => 'create-store']);
        Permission::create(['name' => 'categories']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'products']);
        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'recieve-orders']);
        Permission::create(['name' => 'manage-orders']);
        Permission::create(['name' => 'employees']);
        Permission::create(['name' => 'new-employee']);
		Permission::create(['name' => 'riders']);
        Permission::create(['name' => 'new-rider']);
        Permission::create(['name' => 'home-delivery']);
        Permission::create(['name' => 'pickup']);
        
		Permission::create(['name' => 'staff-dashboard']);

        // create roles and assign created permissions
		
        // this can be done as separate statements
		
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
		
		$roleSuperAdmin->givePermissionTo('dashboard', 'users', 'new-user');
        
		$roleAdmin = Role::create(['name' => 'admin']);
		
		$roleAdmin->givePermissionTo(
			'stores', 
			'create-store', 
			'categories', 
			'create-category', 
			'products', 
			'create-product', 
			'recieve-orders', 
			'manage-orders', 
			'employees', 
			'new-employee', 
			'riders',
			'new-rider',
			'home-delivery', 
			'pickup'
		);
		
		$roleAdmin->givePermissionTo(Permission::all());
        
        $roleEmployee = Role::create(['name' => 'employee']);
		
		$roleEmployee->givePermissionTo(
			'categories', 
			'create-category', 
			'products', 
			'create-product', 
			'recieve-orders', 
			'manage-orders', 
			'home-delivery', 
			'pickup'
		);
		
		$roleEmployee->givePermissionTo('staff-dashboard');
    }
}