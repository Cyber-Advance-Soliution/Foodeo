<?php

namespace App\Http\Controllers;

use App\Coupon;

use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $model = Coupon::all();
        return view('coupon.manage', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(CouponRequest $request)
    {
        $newcoupn = new Coupon();
        $newcoupn->code = $request->code;
        $newcoupn->type = $request->type;
        $newcoupn->value = $request->value;
        $a = $newcoupn->save();
        if ($a) {
            Session::flash('success', 'New coupon created successfully');
        } else {
            Session::flash('success', 'New coupon does not add');
        }
        return redirect('coupon');
    }

    public function show(Coupon $coupon)
    {
        //
    }


    public function edit(Request $request)
    {
        // dd($request);
        $model = Coupon::find($request->id);
        // dd($model);
        return view('coupon.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     */
    public function update(Request $request)
    {
        $newcoupn = Coupon::find($request->coupon_id);
        $newcoupn->code = $request->code;
        $newcoupn->type = $request->type;
        $newcoupn->value = $request->value;
        $a = $newcoupn->save();
        if ($a) {
            Session::flash('success', 'coupon update  successfully');
        } else {
            Session::flash('success', 'coupon does not update');
        }
        return redirect('coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Coupon $coupon
     */
    public function destroy(Request $request)
    {
        $req = Coupon::find($request->id);
        if (!$req) {

            Session::flash('success', 'coupon does not found');
        } else {
            Coupon::destroy(array('id', $request->id));
            Session::flash('success', 'coupon delete  successfully');
        }
        return redirect("coupon");
    }
}
