<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EmployeePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::findByName('employee');
		$role->givePermissionTo(
			'categories', 
			'create-category', 
			'products', 
			'create-product', 
			'recieve-orders', 
			'manage-orders', 
			'home-delivery', 
			'pickup'
		);
    }
}
