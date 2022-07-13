<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/unread-notifications', 'api\ApiNotificationController@OneWeekUnreadNotification');
Route::get('/categories', 'api\ApiCategoryController@index');
Route::get('/products', 'api\ApiProductController@index');
Route::post('/save-order', 'api\ApiOrderController@saveOrder');
Route::get('/orders', 'api\ApiOrderController@index');
Route::post('/home', 'api\ApiSiteController@home');
Route::post('/order-list', 'api\ApiOrderController@allOrder');
Route::post('/order-cancel', 'api\ApiOrderController@orderCancel');
Route::post('/order-complaint', 'api\ApiOrderController@orderComplaint');
Route::post('/login', 'api\ApiAuthController@login');
Route::post('/register', 'api\ApiAuthController@register');
Route::post('/update-profile', 'api\ApiAuthController@updateProfile');
Route::post('/verify-phone', 'api\ApiAuthController@verifyCode');
Route::post('/stripe-payment', 'api\ApiAuthController@stripePayment');
////////////////////////riderr
Route::post('/rider-login', 'api\ApiRiderController@login');
Route::post('/rider-location-save', 'api\ApiRiderController@locationSave');
Route::post('/rider-location-get', 'api\ApiRiderController@locationGet');
Route::post('/rider-dashboard', 'api\ApiRiderController@dashboard');
Route::post('/update-status', 'api\ApiOrderController@updateStatus');
Route::post('/profile-update', 'api\ApiRiderController@profileUpdate');
Route::post('/Rating', 'api\ApiRatingController@SaveRating');
//coupon api
Route::post('/coupon-verification', 'api\ApiOrderController@coupnVerification');
//wallet
Route::post('/customer-wallet', 'api\ApiWalletController@walllet');

