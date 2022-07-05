<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Store;
use App\Rider;
use App\RiderDetail;
use Illuminate\Http\Request;
use App\Http\Requests\RiderRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RiderController extends Controller
{
    public function _construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $createdBy = Auth::user()->id;

        $model = Rider::where('created_by', $createdBy)->get();

        return view('rider/index', compact('model'));
    }

    public function create()
    {
        $createdBy = Auth::user()->id;

        $stores = Store::where('created_by', $createdBy)->get();

        return view('rider/create', compact('stores'));
    }

    public function save(RiderRequest $request)
    {
        $createdBy = Auth::user()->id;

        $parts = explode("@", $request['email']);
        $username = $parts[0];

        $rider = [
            'created_by' => $createdBy,
            'store_id' => $request->store_id,
            'username' => $username,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ];

        $newRider = Rider::create($rider);

        $riderDetail = [
            'rider_id' => $newRider->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        RiderDetail::create($riderDetail);

        Session::flash('success', 'New rider created successfully');

        return redirect('riders');
    }

    public function edit(Request $request)
    {
        $createdBy = Auth::user()->id;

        $stores = Store::where('created_by', $createdBy)->get();

        $model = Rider::where('id', $request->id)->first();

        return view('rider/edit', compact('model', 'stores'));
    }

    public function update(Request $request)
    {
        $createdBy = Auth::user()->id;

        $riderId = $request->rider_id;

        $rider = [
            'created_by' => $createdBy,
            'store_id' => $request->store_id,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ];

        Rider::where('id', $riderId)->update($rider);

        $riderDetail = [
            'rider_id' => $riderId,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        RiderDetail::where('rider_id', $riderId)->update($riderDetail);

        Session::flash('success', 'Rider updated successfully');

        return redirect('riders');
    }

    public function show($id)
    {
        $model = Rider::where('id', $id)->first();

        return view('rider/view', compact('model'));
    }

    public function delete()
    {

    }
}
