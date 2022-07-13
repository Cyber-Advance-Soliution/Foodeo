<?php

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

use Illuminate\Support\Facades\Route;

Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin/dashboard');
///////////////////////////////////////////////////\\\\\\\\\\
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/new-employee', 'EmployeeController@create')->name('new-employee');
Route::post('/create-employee', 'EmployeeController@store')->name('create-employee');
Route::get('/view-employee/{id}', 'EmployeeController@show')->name('view-employee');
Route::get('/edit-employee', 'EmployeeController@edit')->name('edit-employee');
Route::post('/update-employee', 'EmployeeController@update')->name('update-employee');
///////////////////////////////////////////////////
Route::get('/riders', 'RiderController@index')->name('riders');
Route::get('/new-rider', 'RiderController@create')->name('new-rider');
Route::post('/create-rider', 'RiderController@save')->name('create-rider');
Route::get('/view-rider/{id}', 'RiderController@show')->name('view-rider');
Route::get('/edit-rider', 'RiderController@edit')->name('edit-rider');
Route::post('/update-rider', 'RiderController@update')->name('update-rider');
///////////////////////////////////////////////////
Route::get('/stores', 'StoreController@index')->name('stores');
Route::get('/new-store', 'StoreController@create')->name('new-store');
Route::post('create-store', 'StoreController@store')->name('create-store');
Route::get('store-edit', 'StoreController@edit')->name('store-edit');
Route::post('update-store', 'StoreController@update')->name('update-store');
Route::get('store-view/{id}', 'StoreController@show')->name('store-view');
Route::get('view-location/{id}', 'StoreController@storeLocation')->name('view-location');
Route::get('update-status', 'StoreController@updateStatus')->name('update-status');
///////////////////////////////////////////////////
Route::get('/categories', 'ProductCategoryController@index');
Route::get('/new-category', 'ProductCategoryController@create')->name('new-category');
Route::post('create-category', 'ProductCategoryController@store')->name('create-category');
Route::get('category-edit', 'ProductCategoryController@edit')->name('category-edit');
Route::post('update-category', 'ProductCategoryController@update')->name('update-category');
Route::get('store-categories', 'ProductCategoryController@storeCategories')->name('store-categories');
///////////////////////////////////////////////////
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/new-product', 'ProductController@create')->name('new-product');
Route::post('create-product', 'ProductController@store')->name('create-product');
Route::post('update-product', 'ProductController@update')->name('update-product');
Route::get('product-view/{id}', 'ProductController@show')->name('product-view');
Route::get('product-edit', 'ProductController@edit')->name('product-edit');
Route::get('product-status/{id}', 'ProductController@productStatus')->name('product-update-status');
////////////////////////////////////////////////////
Route::get('recieve-orders', 'OrderController@recievedOrders')->name('recieve-orders');
Route::get('manage-orders', 'OrderController@manageOrders')->name('manage-orders');
Route::get('assign-orders', 'OrderController@assignOrders')->name('assign-orders');
Route::post('store-riders', 'OrderController@storeRiders')->name('store-riders');
Route::post('assign', 'OrderController@assign')->name('assign');
Route::post('update-status', 'OrderController@updateStatus')->name('update-status');
Route::post('update-order', 'OrderController@updateOrder')->name('update-order');
Route::get('view-order/{id}', 'OrderController@show')->name('view-order');
Route::get('newOrderView/{notificationId}/{orderId}', 'OrderController@newOrderView');
Route::get('home-delivery', 'OrderController@homeDelivery')->name('home-delivery');
Route::get('pickup', 'OrderController@pickup')->name('pickup');
Route::get('get-orders', 'OrderController@getOrders')->name('get-orders');
Route::get('pickup-orders', 'OrderController@pickup')->name('pickup-orders');
Route::get('assigned-orders', 'OrderController@assignedOrders')->name('assigned-orders');
Route::get('history-orders', 'OrderController@OrderHistory')->name('history-orders');
Route::post('status-list', 'OrderController@statusList')->name('status-list');
Route::post('employee-list', 'OrderController@employeeList')->name('employee-list');
///////////////////////////////complaint
Route::get('complaint-order', 'OrderController@complaint')->name('complaint-orders');
Route::get('complaintView/{id}', 'OrderController@complaintView')->name('complaintView');
Route::get('complaintviewN/{id}/{orderid}', 'OrderController@complaintviewN');
Route::post('complaintstatus', 'OrderController@Ordercomplaintstatus')->name('complaintStatus');
//////////////////////////////////////////////////////////////
Route::get('customers', 'AdminController@customers')->name('customers');
// Route::resource('coupon', 'CouponController');
////////////////////// coupon route
route::get('coupon', 'CouponController@index')->name('coupon');
route::get('create-coupon', 'CouponController@create')->name('create-coupon');
route::post('coupon-store', 'CouponController@store')->name('coupon-store');
route::get('edit-coupon', 'CouponController@edit')->name('edit-coupon');
route::post('coupon-update', 'CouponController@update')->name('coupon-update');
route::get('delete-coupon', 'CouponController@destroy')->name('delete-coupon');
//customer route
route::get('customer', 'CustomerController@customer')->name('customer');
//wallet route
route::get('edit-wallet', 'WalletController@EditWallet')->name('edit-wallet');
route::get('debit-wallet', 'WalletController@DebitWallet')->name('debit-wallet');
route::post('wallet-store', 'WalletController@store')->name('wallet-store');
route::post('wallet-update', 'WalletController@update')->name('wallet-update');




