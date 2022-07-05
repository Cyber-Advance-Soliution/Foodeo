<?php

use App\OrderAssigned;
use App\User;
use App\Customer;
use App\CustomerDetail;
use App\Order;
use App\OrderProduct;
use App\Store;
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Schema;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/assign-role', function () {
    $users = User::all();
    foreach ($users as $user) {
        if ($user->role == 1) {
            $user->assignRole('admin');

            // $permissions = Role::findByName('admin')->permissions;
            // $userPermissions = [];
            // foreach($permissions as $name)
            // {
            // array_push($userPermissions, $name->name);
            // }

            // $user->syncPermissions($userPermissions);
        }
    }
});

Route::get('orders', 'OrderController@index')->name('orders');

Route::get('send', 'HomeController@sendNotification');

/******* Super Admin *********/

Route::get('admin-foodeo', 'AuthController@login')->name('admin-foodeo');
Route::post('admin-auth', 'AuthController@auth')->name('admin-auth');
Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
Route::get('users', 'UserController@index')->name('users');
Route::get('new-user', 'UserController@create')->name('new-user');
Route::post('save-user', 'UserController@save')->name('save-user');
Route::get('edit/{id}', 'UserController@edit')->name('edit');
Route::post('update', 'UserController@update')->name('update');
Route::get('view', 'UserController@view')->name('view');

/******* Employee ************/

Route::get('/staff-dashboard', 'EmployeeController@dashboard')->name('staff-dashboard')->middleware('auth');

/******* Employee ************/

Route::get('/test', 'TestController@index');

Route::get('/password', 'TestController@password');

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return "Cache is cleared";
});

Route::get('/destroy', function () {

    Schema::disableForeignKeyConstraints();
    //Store::truncate();
    OrderAssigned::truncate();
    OrderProduct::truncate();
    Order::truncate();
    CustomerDetail::truncate();
    Customer::truncate();

    Schema::enableForeignKeyConstraints();

});
