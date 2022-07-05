<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Store;
use App\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $createdBy = Auth::user()->id;
        $ownerStoreIds = Store::select('id')->where(['created_by' => $createdBy])->get();

        $recievedOrders = Order::where('status', 0)->whereIn('store_id', $ownerStoreIds)->count();

        $storeCustomerIds = Order::select('customer_id')->whereIn('store_id', $ownerStoreIds)->get();

        $customers = Customer::whereIn('u_id', $storeCustomerIds)->count();
        $stores = Store::where(['created_by' => $createdBy])->count();
        $products = Product::where(['created_by' => $createdBy])->count();

        return view('/admin/dashboard', compact('recievedOrders', 'customers', 'products', 'stores'));
    }

    public function customers()
    {
        $createdBy = Auth::user()->id;

        $ownerStoreIds = Store::select('id')->where(['created_by' => $createdBy])->get();

        $storeCustomerIds = Order::select('customer_id')->whereIn('store_id', $ownerStoreIds)->get();

        $customers = Customer::whereIn('u_id', $storeCustomerIds)->get();

        return view('/admin/customers', compact('customers'));
    }
}
