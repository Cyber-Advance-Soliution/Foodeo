<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {

        // $prodectarr = DB::table('customers')
        // ->leftJoin('wallets', 'customers.u_id', '=', 'wallets.customer_id')
        // ->select('customers.*', 'wallets.*')
        // ->get();
        // dd($prodectarr);

        // $model=Customer::with('wallet')->take(2)->get();
        // $model=Wallet::with('customer')->get();
        $model = Customer::with('wallet')->get();

        // dd($model);
        // $model=Customer::all();
        return view('customer.customer', compact('model'));

    }
}
