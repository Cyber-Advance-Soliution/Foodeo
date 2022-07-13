<?php

namespace App\Http\Controllers\api;

use App\Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\SiteHelper;
use App\Order;
use App\Customer;
use Twilio\Rest\Client;
use App\CustomerDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ApiAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function register(Request $request)
    {
        $user = [
            'username' => $request['username'],
            'u_id' => $request['u_id'],
            'device_token' => null,
            'role' => 3,
            'is_facebook_id' => $request['is_facebook_id'],
            'is_google_id' => $request['is_google_id'],
            'google_token_id' => $request['tokenId'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['Password']),
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'customer_address' => $request['customer_address'],
        ];

        if (isset($request['u_id'])) {
            $customer = Customer::where('u_id', $request['u_id'])->first();

            if (!empty($customer)) {
                $customer = $customer->makeHidden('customerDetail')->toArray();

                $response = [
                    'Message' => 'success',
                    'Status' => 1,
                    'Data' => [
                        'customer' => $customer,
                    ]
                ];

                return response()->json($response);
            }
        }

        try {
            if ($request['is_facebook_id'] == true || $request['is_google_id'] == true) {
                $email = $request['email'];
                if ($email) {
                    $customer = Customer::where('email', $email)->first();
                    if (!empty($customer)) {
                        Customer::where('email', $email)->update($user);
                    } else {
                        $customer = Customer::create($user);

                        $customerDetail = CustomerDetail::create([
                            'customer_id' => $customer->id,
                            'phone_number' => $request['phone_number'],
                        ]);
                    }
                }
            } else {
                $customer = Customer::create($user);
                $customerDetail = CustomerDetail::create([
                    'customer_id' => $customer->id,
                    'phone_number' => $request['phone_number'],
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $response = [
                'Message' => 'Some error occured during request. Please contact support team.',
                'Status' => 0,
                'Data' => null,
                'Errors' => $e->errorInfo
            ];
            return response()->json($response);
        }

        $newCustomer = $customer->makeHidden('customerDetail')->toArray();

        $response = [
            'Message' => 'success',
            'Status' => 1,
            'Data' => [
                'customer' => $newCustomer,
            ]
        ];

        return response()->json($response);
    }

    public function updateProfile(Request $request)
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

        $uId = $request->u_id;

        if ($request->is_google_id == true || $request->is_facebook_id == true) {
            $customer = [
                'username' => $request->username,
                'customer_address' => $request->customer_address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'phone_number' => $request->phone_number,
                'image' => $image_path ?? ''
            ];
        } else {
            $customer = [
                'username' => $request->username,
                'customer_address' => $request->customer_address,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $image_path ?? ''
            ];
        }


        $customerUpdate = Customer::where('u_id', $uId)->update($customer);

        if ($customerUpdate == true) {
            $response = [
                'Message' => 'success',
                'Status' => 1,
                'image' => $image_path
            ];
        } else {
            $response = [
                'Message' => 'Some error occured during request. Please contact support team.',
                'Status' => 0,
            ];
        }

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

    public function stripePayment()
    {
        $response = [
            'Message' => 'success',
            'Status' => 1,
            'Data' => null,
        ];

        return response()->json($response);
    }

}
