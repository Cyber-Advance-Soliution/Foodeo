<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Customer;
use App\Store;
use App\ProductCategory;
use App\Order;
use Illuminate\Support\Facades\DB;

class ApiSiteController extends Controller
{
    public function index()
    {
		$productCategories = ProductCategory::with('products')->get();
		
        $products = Product::with('productBanners', 'productAttributes')->get();
		
		$store = Store::with('storeBanners')->where(['status' => 1])->get();
		
		$Deals = [];
		
		$orders = Order::with('orderProducts')->get();
		
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'Categories' => $productCategories,
				'Popularfood' => $products,
				'Store' => $store,
				'Deals' => $Deals,
				'MyOrders' => $orders,
			]
		];
		
        return response()->json($response);
    }
	
	public function home(Request $request)
	{
		$customerId = $request['u_id'];
		$deviceToken = $request['device_token'];
		
		if($deviceToken)
		{
			Customer::where('u_id', $customerId)->update(['device_token' => $deviceToken]);
		}
		
		$customerAdrress = $request['customer_adrress'];
		$lat = $request['latitude'];
		$lon = $request['longitude'];
		
		$hubStore = Store::where(['store_type_id' => 1])->first();
		
		$nearestStore = Store::select("*"
			,DB::raw("6371 * acos(cos(radians(" . $lat . "))
			* cos(radians(stores.latitude))
			* cos(radians(stores.longitude) - radians(" . $lon . "))
			+ sin(radians(" .$lat. "))
			* sin(radians(stores.latitude))) AS nearest"))
			->with('storeBanners')
			->where(['status' => 1])
			->orderBy("nearest", 'asc')
			->limit(1)
			->get();
		
		$storeProductCategories = ProductCategory::where('store_id', $nearestStore[0]->id)->get();
		$storeProducts = Product::with('productBanners', 'productAttributes')->where('store_id', $nearestStore[0]->id)->get();
		
		$customerOrders = Order::with('orderProducts')->where('customer_id', $customerId)->get();
		
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'Restaurant' => [
					'id' => $hubStore->id,
					'restaurant_name' => $hubStore->store_name,
					'restaurant_thumbnail' => $hubStore->store_thumbnail,
					'nearest_store' => $nearestStore[0],
					'Categories' => $storeProductCategories,
					'Products' => $storeProducts,
					'BestDeals' => []
				],
				'MyOrders' => $customerOrders,
			]
		];
		
        return response()->json($response);
	}
}
