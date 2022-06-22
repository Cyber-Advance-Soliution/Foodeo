<?php

namespace App\Http\Controllers\api;

use Auth;
use SiteHelper;
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
	
	public function login(Request $request)
    {
      
        if (Auth::guard('customer')->attempt(['email' => $request['email'], 'password' => $request['Password']], $request->get('remember'))) 
		{
			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' => [
					'customer' => Auth::guard('customer')->user(),
				]
			];
			
			return response()->json($response);
        }
		
		$response = [
			'Message' => 'Email or password is not valid.',
			'Status' => 0,
			'Data' => null
		];
		
		return response()->json($response);
    }
	
	private function sendMessage($recipient, $code) {
	
		$account_sid = getenv("TWILIO_SID");
		$auth_token = getenv("TWILIO_AUTH_TOKEN");
		$twilio_number = getenv("TWILIO_NUMBER");
		$client = new Client($account_sid, $auth_token);
		
		try{
			$client->messages->create($recipient, 
				['from' => $twilio_number, 'body' => $code] );
		} catch(Exception $e){
			return false;
		}
		return true;
	}
	
	private function mobileAuth($mobileNumber)
	{
		return $mobileNumber;
	}
	
	private function googleAuth($email, $u_id)
	{
		$model = Customer::where(['email' => $email])->first();
		if(!empty($model))
		{
			$model_ = Customer::where(['u_id' => $u_id])->first();
			if(isset($model_)) {
				$response = [
					'Message' => 'success',
					'Status' => 1,
					'Data' => [
						'customer' => $model_,
					],
				];
				
				return response()->json($response);
			} else {
				$response = [
					'Message' => 'Customer not found',
					'Status' => 0,
					'Data' => null,
				];
				
				return response()->json($response);
			}
		} 
		return false;
	}
	
	private function facebookAuth($email, $u_id)
	{
		$model = Customer::where(['email' => $email])->first();
		if(!empty($model))
		{
			$model_ = Customer::where(['u_id' => $u_id])->first();
			if(isset($model_)) {
				$response = [
					'Message' => 'success',
					'Status' => 1,
					'Data' => [
						'customer' => $model_,
					],
				];
				
				return response()->json($response);
			} else {
				$response = [
					'Message' => 'Customer not found',
					'Status' => 0,
					'Data' => null,
				];
				
				return response()->json($response);
			}
		} 
		return false;
	}
	
	public function register(Request $request)
	{
		$user = [
            'username' => $request['username'],
            'u_id' => $request['u_id'],
            'device_token' => null,
            'role' => 3,
            'is_facebook_id' => $request['is_facebook_id'],
            'is_google_id' =>$request['is_google_id'],
            'google_token_id' =>$request['tokenId'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['Password']),
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'customer_address' => $request['customer_address'],
        ];
		
		if(isset($request['u_id']) && isset($request['phone_number']))
		{
			$customer = Customer::where('u_id', $request['u_id'])->first();
			
			if(!empty($customer))
			{
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
		
		try
		{
			if($request['is_facebook_id'] == true || $request['is_google_id'] == true)
			{
				$email =  $request['email'];
				if($email)
				{
					$customer = Customer::where('email', $email)->first();
					if(!empty($customer))
					{
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
		}
		catch (\Illuminate\Database\QueryException $e) 
		{
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
		$uId = $request->u_id;
		
		if($request->is_google_id == true || $request->is_facebook_id == true)
		{
			$customer = [
				'username' => $request->username,
				'customer_address' => $request->customer_address,
				'latitude' => $request->latitude,
				'longitude' => $request->longitude,
			];
		} else {
			$customer = [
				'username' => $request->username,
				'customer_address' => $request->customer_address,
				'email' => $request->email,
				'latitude' => $request->latitude,
				'longitude' => $request->longitude,
			];
		}
			
		
		$customerUpdate = Customer::where('u_id', $uId)->update($customer);
		
		if($customerUpdate == true)
		{
			$response = [
				'Message' => 'success',
				'Status' => 1,
			];
		} else {
			$response = [
				'Message' => 'Some error occured during request. Please contact support team.',
				'Status' => 0,
			];
		}
		
		return response()->json($response);
	}
	
	public function verifyCode(Request $request)
	{
		$validation = Validator::make($request->all(),[ 
			'code' => 'required',
		]);
		
		if($validation->fails()) {
			$errors = $validation->errors();
			$response = [
				'Message' => 'Some error occured during request. Please contact support team.',
				'Status' => 0,
				'Data' => null,
				'Errors' => $errors
			];
			
			return response()->json($response);
		}
		$requestedCode = $request['code'];
		$customerId = $request['id'];
		$phoneNumber = $request['phone_number'];
		
		$customerDetail = CustomerDetail::with('customer')->where(['phone_number' => $phoneNumber])->first();
		$verificationCode = '';
		if(!empty($customerDetail)) {
			$verificationCode = $customerDetail->customer->code;
		}	
		
		if($requestedCode == $verificationCode) {
			Customer::where(['id' => $customerId])->update(['phone_verify_status' => 1]);
			$newCustomer = Customer::where(['id' => $customerId])->first();
			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' => [
					'customer' => $newCustomer,
				]
			];
		} else {
			$response = [
				'Message' => 'Invalid Code',
				'Status' => 0,
				'Data' => null,
			];
		}
		
		return response()->json($response);
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
