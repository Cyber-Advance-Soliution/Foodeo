<?php

namespace App\Http\Controllers\api;

use Auth;
use App\Order;
use App\Rider;
use App\RiderLocation ;
use App\RiderDetail;
use App\OrderAssigned;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ApiRiderController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest')->except('logout');
		$this->middleware('guest:rider')->except('logout');
	}

	public function login(Request $request)
    {
			Log::debug('login in');

        if (Auth::guard('rider')->attempt(['username' => $request['username'], 'password' => $request['password']], $request->get('remember')))
		{
			$authid=auth()->id;
			// Log::debug(auth()->id);

			// Rider::where('username',$request->username)->update('device_token',88888);
			$ab=Rider::where('id',$authid)->update('device_token',49999);
			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' => [
					'rider' => Auth::guard('rider')->user(),
				]
			];

			return response()->json($response);
        }

		$response = [
			'Message' => 'Username or password is not valid.',
			'Status' => 0,
			'Data' => null
		];

		return response()->json($response);
    }

	public function profileUpdate(Request $request)
	{
        try {
            $image = ($request->has('image') ? $request->image : '');
            $image_path = "";
            if (isset($image)) {
                $image_path = $this->imageUpload($request, 'assets/uploads/profile_images','profile_image');
            }
        } catch (Exception $e) {
            $response = [
                'Message' => 'Some error occurred during Image Upload request. ' .$e->getMessage(),
                'Status' => 0,
            ];
            return response()->json($response);
        }

		$riderId = $request->id;

		$rider = [
			"email" => $request->email,
            "image" => $image_path
		];

		Rider::where('id', $riderId)->update($rider);

		$riderDetail = [
			"address" => $request->address,
			"name" => $request->name,
			"phone_number" => $request->phone_number,
		];

		RiderDetail::where('rider_id', $riderId)->update($riderDetail);

		$updatedRider = Rider::where('id', $riderId)->get();

		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'rider' => $updatedRider,
			]
		];

		return response()->json($response);
	}

    public function imageUpload($file, $url = 'assets/uploads/images', $name = 'image')
    {
        $allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
        if (in_array($file->image->extension(), $allowed)) {
//            $name = "slider";
            $fileName = time() . $name . '.' . $file->image->extension();
            $file->image->move(public_path($url), $fileName);
            $filepath = $url . '/' . $fileName;
        }
        return str_replace('\\', '', $filepath);
    }

    public function dashboard(Request $request)
    {
    	$riderId = $request->rider_id;
		$rider = Rider::where('id', $riderId)->first();
		// dd(OrderAssigned::all());
		$orderAssigned = OrderAssigned::with('order', 'customer')
			->where(['rider_id' => $riderId])
			->whereIn('order_id', function($query){
				$query->select('id')
				->from(with(new Order)->getTable())
				->where('status', 4);
			})->get();

		$orderHistory = OrderAssigned::with('order', 'customer')
			->where('rider_id', $riderId)
			->whereIn('order_id', function($query){
				$query->select('id')
				->from(with(new Order)->getTable())
				->where('status', '>', 4);
			})
			->get();



    	$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'OrderAssigned' => $orderAssigned,
				'OrderHistory' => $orderHistory,
				'Payments' => null,
				'Notifications' => null,
				'Profile' => null,
			]
		];

		return response()->json($response);
    }

	public function locationSave(Request $request)
	{

		$req=RiderLocation::where('rider_id',$request->rider_id)->first();
		if($req){
			$req->lat=$request->lat;
			$req->long=$request->long;
			$req->save();
			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' => $req,
			];
			return response()->json($response);
		}
		else{
			$obj=new RiderLocation();
			$obj->lat=$request->lat;
			$obj->long=$request->long;
			$obj->rider_id=$request->rider_id;
			$save=$obj->save();
			if($save){
				$response = [
					'Message' => 'success',
					'Status' => 1,
					'Data' => $obj,
				];
				return response()->json($response);

			}
		}

	}
	public function locationGet(Request $request)
	{
		$req=RiderLocation::where('rider_id',$request->rider_id)->first();
		if($req){

			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' =>[
					'riderlocation'=>$req
					]
			];

		}else{
			$response = [
				'Message' => 'location  not found',
				'Status' => 0,
				'Data' =>null
			];

		}
		return response()->json($response);
	}
}
