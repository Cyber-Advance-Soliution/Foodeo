<?php

namespace App\Http\Controllers\api;

use App\Order;
use App\Rider;
use SiteHelper;
use App\Customer;
use App\OrderProduct;
use App\OrderAssigned;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderCompliant;
use App\User;
use App\Coupon;
use App\Wallet;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;


class ApiOrderController extends Controller
{
    public function index()
    {
        $products = Order::all();
	
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
			]
		];
		
        return response()->json($response);
    }
	
	
	public function saveOrder(Request $request)
	{
	
		$user = $request->input('user');
		$paymentModel = $request->input('paymentModel');
		$productModel = $request->input('productModel');
		
	    $storeId = $productModel[0]['store_id'];
		$customerId = $user['u_id'];
		$customerAddress = $user['customer_address'];
		$latitude = $user['latitude'];
		$longitude = $user['longitude'];
		
		$deliveryCharges = $paymentModel['DeliveryCharges'];
		
		$discount = $paymentModel['Discount'];
		$walletPayment = $paymentModel['walletPayment'];
		
		$coupon=0;
		$couponId=null;
		if(isset($paymentModel['coupon_id'])){
			$couponId= $paymentModel['coupon_id'];
			$coupon= $paymentModel['coupon'];
		}
		// dd($walletPayment,$coupon,$couponId);



		$grandTotal = $paymentModel['GrandTotal'];
		$orderTypeModel = $paymentModel['OrderTypeModel'];
		$subTotal = $paymentModel['SubTotal'];
		
		$isHomeDelivery = $orderTypeModel['IsHomeDelivery'];
		$isPickup = $orderTypeModel['IsPickup'];
		
		
		$isCashOnDelivery = 0;
		$isPaymentMethodAdded = 0;
		$paymentMethodId = 0;
		
		if(isset($orderTypeModel['paymentType'])) 
		{
			$paymentType = $orderTypeModel['paymentType'];
		
			$isCashOnDelivery = $paymentType['IsCashOnDelivery'];
			$isPaymentMethodAdded = $paymentType['IsPaymentMethodAdded'];
			$paymentMethodId = $paymentType['PaymentMethodId'];
		}
		
		$order = [
			'store_id' => $storeId,
			'customer_id' => $customerId,
			'delivery_charges' => $deliveryCharges,
			'discount' => $discount,
			'sub_total' => $subTotal,
			'walletPayment'=>$walletPayment,
			'coupon'=>$coupon,
			'coupon_id'=>$couponId,
			'grand_total' => $grandTotal,
			'home_delivery' => $isHomeDelivery,
			'cash_on_delivery' => $isCashOnDelivery,
			'pickup' => $isPickup,
			'payment_method' => $isPaymentMethodAdded,
			'payment_method_id' => $paymentMethodId,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'customer_address' => $customerAddress,
		];
		// dd($order);
		
		$newOrder = Order::create($order);
		$orderId = $newOrder->id;
		if($orderId){
			// wallet credit 
			if($walletPayment>0){

			$wallet=new Wallet();
			$wallet->credit=$walletPayment;
			$wallet->customer_id=$customerId;
			$wallet->save();
			}
			// coupon status change 
			if (!$couponId==null) {
				$coupon=Coupon::find($couponId);
				$coupon->status=1;
				$coupon->save();
			}
			
		//db notification
		$orderComplaint=null;
        $canceleOrder=null;
		$admin=User::where('id',2)->first();
		$title = 'New Order  ';
		$orderid = ' Order number is ' .$orderId;
		$neworder= collect(['title' => $title, 'orderid' => $orderid, 'id' => $orderId]);
		Notification::send($admin, new OrderNotification($neworder, $canceleOrder, $orderComplaint));
		}
		
		foreach($productModel as $key => $product)
		{
			$productId = $product['id'];
			$productAttributes = $product['product_attributes'];
			$productPrice = $product['product_price'];
			$productQunatity = $product['product_quantity'];
			$productTotalPrice = $product['product_total_price'];
			
			$orderProduct = [
				'order_id' => $orderId,
				'product_id' => $productId,
				'product_price' => $productPrice,
				'product_quantity' => $productQunatity,
				'product_total_price' => $productTotalPrice,
				'product_attributes' => serialize($productAttributes),
			];

			
			OrderProduct::create($orderProduct);
		}
		
		// $updateUser = Customer::where('id', $customerId)->update([
			// 'customer_address' => $customerAddress,
			// 'latitude' => $latitude,
			// 'longitude' => $longitude
		// ]);
		
		$contact_number = '111-222-333';
		$orderReference = SiteHelper::orderReference($orderId);
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'order_reference' => $orderReference,
				'contact_number' => $contact_number,
			]
		];
	
        return response()->json($response);
	}

	public function orderCancel(Request $request)
	{
		$req= Order::where(['id'=>$request->order_id,'customer_id'=>$request->customer_id])->first();
		if($req){
			if($req->status==0 ){
				$req->status=7;
				$req->save();

				// coupon resatus
				if(!$req->coupon->id==null){
				$coupon=Coupon::find($req->coupon_id);
				$coupon->status=0;
				$coupon->save();
				}
				//  wallet return value
				
				if($req->walletPayment>0){
				$wallet=new Wallet();
				$wallet->debit=$req->walletPayment;
				$wallet->customer_id=$request->customer_id;
				$wallet->save();
				}
				$response = [
					'Message' => 'success',
					'Status' => 1,
					'Data' => [
						'message'=>'order canceled']
				];
				$orderComplaint=null;
				$neworder=null;
				$admin=User::where('id',2)->first();
				$title = 'Canceled Order  ';
				$orderid = ' Order number is ' .$id;
				$canceleorder= collect(['title' => $title, 'orderid' => $orderid, 'id' => $id]);
				Notification::send($admin, new OrderNotification($neworder, $canceleorder, $orderComplaint));
			}else{
				$response = [
					'Message' => 'fail',
					'Status' => 0,
					'Data' => [
						'message'=>'order not canceled']
				];
			}
		}else{
			$response = [
				'Message' => 'fail',
				'Status' => 0,
				'Data' => [
					'message'=>'missing data']
			];
		}
		return response()->json($response);
	}

	public function allOrder(Request $request)
	{
		// $orderdata = Order::with('orderProducts')->where('customer_id',$request->customer_id)->get();
		$orderdata = Order::with('orderProducts','orderAssigned')->where('customer_id',$request->customer_id)->get();
		// $orderdata=$orderdata->toArray();
		// dd($orderdata);

		$orderList=array();
		$i = 0;
			foreach($orderdata as $item){
				// dd($item->orderAssigned->rider->name);
				$orderList[$i]['order_id']=$item->id??"";
				$orderList[$i]['store_id']=$item->store_id??"";
				$orderList[$i]['customer_id']=$item->customer_id??"";
				$orderList[$i]['pickup']=$item->pickup??"";
				$orderList[$i]['home_delivery']=$item->home_delivery??"";
				$orderList[$i]['cash_on_delivery']=$item->cash_on_delivery??"";
				$orderList[$i]['delivery_charges']=$item->delivery_charges??"";
				$orderList[$i]['discount']=$item->discount??"";
				$orderList[$i]['tax']=$item->tax??"";
				$orderList[$i]['sub_total']=$item->sub_total??"";
				$orderList[$i]['grand_total']=$item->grand_total??"";
				$orderList[$i]['payment_method']=$item->payment_method??"";
				$orderList[$i]['status']=$item->status??"";
				$orderList[$i]['latitude']=$item->latitude??"";
				$orderList[$i]['longitude']=$item->longitude??"";
				$orderList[$i]['customer_address']=$item->customer_address??"";
				$orderList[$i]['created_at']=$item->created_at??"";
				$orderList[$i]['updated_at']=$item->updated_at??"";
				// $orderReference = SiteHelper::orderReference($item->id);
				$orderList[$i]['order_reference']=SiteHelper::orderReference($item->id)??"";
				$orderList[$i]['orderProducts']=$item->orderProducts;
				$orderList[$i]['rider_id']=$item->orderAssigned->rider_id??"";
				$orderList[$i]['rider_name']=$item->orderAssigned->rider->name??"";
			
			$i++;
			
		}
		if($orderdata->isEmpty()){
			$response = [
				'Message' => 'fail',
				'Status' => 0,
				'Data' =>null
			];
		}else{
			$response = [
				'Message' => 'success',
				'Status' => 1,
				'Data' =>['order-list'=> $orderList]
				
			];
		}
        return response()->json($response);
	}

	public function updateStatus(Request $request)
	{
		$data = [
			'status' => $request->status,
		];
		
		$order = Order::where('id', $request->order_id)->update($data);
		
		if(isset($order))
		{
			$riderId = $request->rider_id;
			$rider = Rider::where('id', $riderId)->first();
			
			$orderAssigned = OrderAssigned::with('order', 'customer')
				->where(['rider_id' => $riderId])
				->whereIn('order_id', function($query){
					$query->select('id')
					->from(with(new Order)->getTable())
					->where('status', 3);
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
		} else {
			$response = [
				'Message' => 'Request failed',
				'Status' => 0,
				'Data' => null
			];
		}
		return response()->json($response);
	}

	public function orderComplaint(Request $request)
	{
		// dd($request->all());
		$req=new OrderCompliant();
		$req->message=$request->message;
		$req->customer_id =$request->uu_id;
		$get=$req->save();
		
		
		if($get){
		$canceleorder=null;
		$neworder=null;
		$admin=User::where('id',2)->first();
		$title = 'new Complaint  ';
		$orderid = $request->message;
		$orderComplaint= collect(['title' => $title, 'orderid' =>$orderid, 'id' =>$req->id]);
		Notification::send($admin, new OrderNotification($neworder, $canceleorder, $orderComplaint));
		}
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' =>'compalint send'
		];
        return response()->json($response);
	}

	public function coupnVerification(Request $request)
	{
		
		$cusromer=Customer::where('u_id',$request->uu_id)->first();
		if($cusromer){
				$coupon=Coupon::where('code',$request->code)->first();
				// dd($coupon);
				if($coupon && $coupon->status==0){
					$response=[
						'message'=>'success',
						'status'=>1,
						'data'=>$coupon
					];
				}else {
					$response=[
						'message'=>'invalid coupon code',
						'status'=>0,
						'data'=>null,
				];
				}
		}
		else{
			$response=[
				'message'=>'USER not found',
				'status'=>0,
				'data'=>null,
				];
		}
        return response()->json($response);
		

	}

}
