<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Rider;
use App\Order;
use App\OrderCompliant;
use App\Store;
use App\Helpers\SiteHelper;
use App\Customer;
use App\OrderAssigned;
use App\PickupStatusList;
use App\DeliveryStatusList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Wallet;
use App\Coupon;
use App\Notifications\Databasenotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $createdBy = Auth::user()->id;

        $ownerStoreIds = Store::select('id')->where(['created_by' => $createdBy])->get();
        $model = Order::whereIn('store_id', $ownerStoreIds)->get();

        return view('order/index', compact('model'));
    }

    public function recievedOrders()
    {
        $createdBy = Auth::user()->id;

        $ownerStoreIds = Store::select('id')->where(['created_by' => $createdBy])->get();

        $model = Order::whereIn('store_id', $ownerStoreIds)->where(['status' => 0])->orderBy('id', 'DESC')->get();

        $modelEmployee = \App\User::with('userDetail')->where(['status' => 1])->get();

        return view('order/recieveOrders', compact('model', 'modelEmployee'));
    }

    public function manageOrders()
    {
        $createdBy = Auth::user()->id;

        $ownerStoreIds = Store::select('id')
            ->where('status', '!=', 0)
            ->where(['created_by' => $createdBy])
            ->limit(5)
            ->get();

        $model = Order::whereIn('store_id', $ownerStoreIds)->whereIn('status', [1, 2])->get();

        return view('order/manageOrders', compact('model'));
    }

    public function assignOrders()
    {
        // dd('...');
        $createdBy = Auth::user()->id;

        $ownerStoreIds = Store::select('id')
            ->where('status', '!=', 0)
            ->where(['created_by' => $createdBy])
            ->limit(5)
            ->get();

        $assignedIds = OrderAssigned::select('order_id')->get();

        $model = Order::whereIn('store_id', $ownerStoreIds)->whereNotIn('id', $assignedIds)->where(['status' => 3, 'home_delivery' => 1])->get();


        return view('order/assignOrders', compact('model'));
    }

    public function storeRiders(Request $request)
    {

        $orderId = $request['order_id'];
        $store = Order::where('id', $orderId)->select('store_id')->first()->makeHidden('order_reference');
        $storeId = $store->store_id;
        $list = [];

        if ($storeId) {
            $list = Rider::all();
        }

        $html = '';
        foreach ($list as $rider) {
            $html .= '<option value="' . $rider->id . '">' . $rider->riderDetail->name . '</option>';
        }

        echo $html;
    }

    public function assign(Request $request)
    {
        // assign to rider on assign view poppup route
        //  dd($request);
        $data = [
            'order_id' => $request->order_id,
            'rider_id' => $request->rider_id,
        ];
        //dd( $request->rider_id);
        $a = OrderAssigned::create($data);
        // dd($a);
        if ($a) {
            $ab = Order::where(['id' => $request->order_id])->update(['status' => 4]);
            // dd($ab);
        }
        // //	//	// for notification msg to customer and


        $order = Order::where(['id' => $request->order_id])->first();
        $customer = Customer::where('u_id', $order->customer_id)->first();
         $deviceToken = $customer->device_token;
//        $deviceToken = "ekvPRy97828:APA91bEMoru-uNhiCc0qBAYQOCv9Jt4bmirz9ow2-Ski7ptXZwoS693J9Atmb_tObYO9E5IYFQNK1Zk19aYJ6RqAKPWezmdTtIRaTyApUk5EWNVpOrk6w6AdxMQM2p2U1DiRnKIhCEww";
        $statusarr = array('1' => 'accepted', '2' => 'preparing', '3' => 'ready to deliver', '4' => 'out for deliver', '5' => ' delivered', '6' => 'cancelled');
        $title = 'Order Status.';
        $message = $statusarr[$order->status];

        SiteHelper::send_notification_FCM($deviceToken, $title, $message);
        // rider notification
        $Rider = Rider::where(['id' => $request->rider_id])->first();
        $RiderDeviceToken = $Rider->device_token;
        $ridertitle = 'Feedeo order.';
        $ridermessage = 'Receive new order';
        SiteHelper::send_notification_FCM($RiderDeviceToken, $ridertitle, $ridermessage);

        Session::flash('success', 'Order assigned successfully');

        return redirect('assign-orders');
    }

    public function homeDelivery()
    {
        return view('order/homeDelivery');
    }

    public function pickup()
    {
        $model = Order::where(['pickup' => 1, 'status' => 3])->get();
        // dd($model);
        return view('order/pickuporder', compact('model'));
    }

    private function ordersByStatus($status)
    {
        $orders = Order::select('id')->where(['status' => $status, 'home_delivery' => 1])->limit(5)->get();

        $html = '';
        foreach ($orders as $key => $order) {
            $ref = $order->id;
            $html .= ' <span class="info-box-number text-center text-muted mb-0"> ' . ' # ' . SiteHelper::orderReference($ref) . '</span>';
        }

        return $html;
    }

    public function getOrders()
    {
        $pending = $this->ordersByStatus(0);
        $accepted = $this->ordersByStatus(1);
        $preparing = $this->ordersByStatus(2);
        $readyToDeliver = $this->ordersByStatus(3);
        $outForDelivery = $this->ordersByStatus(4);
        $delivered = $this->ordersByStatus(5);

        $response = [
            'Pending' => $pending,
            'Accepted' => $accepted,
            'Preparing' => $preparing,
            'ReadyToDeliver' => $readyToDeliver,
            'OutForDelivery' => $outForDelivery,
            'Delivered' => $delivered,
        ];

        return json_encode($response);
    }

    private function ordersPickupByStatus($status)
    {
        $orders = Order::select('id')->where(['status' => $status, 'pickup' => 1])->get();

        $html = '';
        foreach ($orders as $key => $order) {
            $ref = $order->id;
            $html .= ' <span class="info-box-number text-center text-muted mb-0"> ' . ' # ' . SiteHelper::orderReference($ref) . '</span>';
        }

        return $html;
    }

    public function pickupOrders()
    {
        $pending = $this->ordersPickupByStatus(0);
        $accepted = $this->ordersPickupByStatus(1);
        $preparing = $this->ordersPickupByStatus(2);
        $readyToPickup = $this->ordersPickupByStatus(3);
        $collected = $this->ordersPickupByStatus(4);
        $cancelled = $this->ordersPickupByStatus(5);

        $response = [
            'Pending' => $pending,
            'Accepted' => $accepted,
            'Preparing' => $preparing,
            'ReadyToPickup' => $readyToPickup,
            'Collected' => $collected,
            'Cancelled' => $cancelled,
        ];

        return json_encode($response);
    }

    public function updateStatus(Request $request)
    {
        // dd($request);
        $orderId = $request['order_id'];
        $orderStatus = $request['order_status'];

        Order::where(['id' => $orderId])->update(['status' => $orderStatus]);

        $order = Order::where(['id' => $orderId])->first();

        $customer = Customer::where('u_id', $order->customer_id)->first();

        // $deviceToken = $customer->device_token;
        $deviceToken = 'ekvPRy97828:APA91bEMoru-uNhiCc0qBAYQOCv9Jt4bmirz9ow2-Ski7ptXZwoS693J9Atmb_tObYO9E5IYFQNK1Zk19aYJ6RqAKPWezmdTtIRaTyApUk5EWNVpOrk6w6AdxMQM2p2U1DiRnKIhCEww';
        $title = 'hh';
        $message = 'nnn';

        SiteHelper::send_notification_FCM($deviceToken, $title, $message);
        // SiteHelper::sendNotification($order, $deviceToken);

        $response = [
            'status' => 1,
            'message' => 'success',
        ];

        echo json_encode($response);
    }

    public function updateOrder(Request $request)
    {
        //recived order then change the status of order in reciving view

        //   dd($request->all());

        $orderId = $request['order_id'];
        $orderStatus = $request['order_status'];

        $a = Order::where(['id' => $orderId])->update(['status' => $orderStatus]);
        if ($a == 1) {
            $orderCancele = Order::find($orderId);

            if (!$orderCancele->coupon_id == null) {
                $coupon = Coupon::find($orderCancele->coupon_id);
                $coupon->status = 0;
                $coupon->save();
            }

            if ($orderCancele->walletPayment > 0) {
                $wallet = new Wallet();
                $wallet->debit = $orderCancele->walletPayment;
                $wallet->customer_id = $orderCancele->customer_id;
                $wallet->save();
            }
        }

        $order = Order::where(['id' => $orderId])->first();

        $customer = Customer::where('u_id', $order->customer_id)->first();

        // $deviceToken = $customer->device_token;
        $deviceToken = "ekvPRy97828:APA91bEMoru-uNhiCc0qBAYQOCv9Jt4bmirz9ow2-Ski7ptXZwoS693J9Atmb_tObYO9E5IYFQNK1Zk19aYJ6RqAKPWezmdTtIRaTyApUk5EWNVpOrk6w6AdxMQM2p2U1DiRnKIhCEww";
        // $title='hh';
        // $message='nnn';

        $statusarr = array('1' => 'accepted', '2' => 'preparing', '3' => 'ready to deliver', '4' => 'out for deliver', '5' => ' delivered', '6' => 'cancelled');
        $title = 'Order Status.';
        $message = $statusarr[$order->status];


        SiteHelper::send_notification_FCM($deviceToken, $title, $message);


        // SiteHelper::sendNotification($order, $deviceToken);

        $response = [
            'status' => 1,
            'message' => 'success',
        ];

        return redirect('manage-orders');
    }

    public function statusList(Request $request)
    {

        $orderId = $request['order_id'];
        $order = Order::where(['id' => $orderId])->first();

        $list = [];

        if ($order->pickup == 1) {
            $list = PickupStatusList::all();
        } else if ($order->home_delivery == 1) {
            $list = DeliveryStatusList::all();
        }

        $html = '<option disabled > -- Select Status -- </option>';
        foreach ($list as $status) {
            if ($order->status == 0) {
                if ($status->id == 1 || $status->id == 6) {
                    $html .= '<option value="' . $status->id . '">' . $status->name . '</option>';
                }
                # code...
            }
            if ($order->status == 1 || $order->status == 2) {
                if ($status->id == 2 || $status->id == 3) {
                    $html .= '<option value="' . $status->id . '">' . $status->name . '</option>';
                }
                # code...
            }
            if ($order->status == 3) {
                if ($status->id == 4) {
                    $html .= '<option value="' . $status->id . '">' . $status->name . '</option>';
                }
            }

        }

        echo $html;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $orderLocation = '';
        $storeLocation = '';

        $model = Order::with('orderProducts')->where(['id' => $id])->first();

        if (!empty($model)) {
            $latitude = $model->latitude;
            $longitude = $model->longitude;

            $storeLatitude = $model->store->latitude;
            $storeLongitude = $model->store->longitude;

            $url = "https://maps.google.com/maps/api/geocode/json?latlng=" . $latitude . ',' . $longitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

            $url_ = "https://maps.google.com/maps/api/geocode/json?latlng=" . $storeLatitude . ',' . $storeLongitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

            $curl_return = SiteHelper::getLocation($url);

            $curl_return_ = SiteHelper::getLocation($url_);

            $obj = json_decode($curl_return);

            $obj_ = json_decode($curl_return_);

            if (!empty($obj->results[0]->formatted_address)) {
                $orderLocation = $obj->results[0]->formatted_address;
            }

            if (!empty($obj_->results[0]->formatted_address)) {
                $storeLocation = $obj_->results[0]->formatted_address;
            }
        }

        return view('order/view', compact('model', 'orderLocation', 'storeLocation'));
    }


    public function newOrderView($notificationId, $id)
    {

        $orderLocation = '';
        $storeLocation = '';

        $model = Order::with('orderProducts')->where(['id' => $id])->first();

        if (!empty($model)) {
            $latitude = $model->latitude;
            $longitude = $model->longitude;

            $storeLatitude = $model->store->latitude;
            $storeLongitude = $model->store->longitude;

            $url = "https://maps.google.com/maps/api/geocode/json?latlng=" . $latitude . ',' . $longitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

            $url_ = "https://maps.google.com/maps/api/geocode/json?latlng=" . $storeLatitude . ',' . $storeLongitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

            $curl_return = SiteHelper::getLocation($url);

            $curl_return_ = SiteHelper::getLocation($url_);

            $obj = json_decode($curl_return);

            $obj_ = json_decode($curl_return_);

            if (!empty($obj->results[0]->formatted_address)) {
                $orderLocation = $obj->results[0]->formatted_address;
            }

            if (!empty($obj_->results[0]->formatted_address)) {
                $storeLocation = $obj_->results[0]->formatted_address;
            }
        }
        auth()->user()->unreadNotifications->where('id', $notificationId)->markAsRead();
        return view('order/view', compact('model', 'orderLocation', 'storeLocation'));


    }

    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }

    public function complaint()

    {
        $model = OrderCompliant::all();
        return view('complaint.manage', compact('model'));
    }

    public function complaintView($id)
    {
        // $model=OrderCompliant::with('customer')->where('id',$id)->get();
        // dd($model[0]->customer_id);
        // return view('complaint.view',compact('model'));
        $ComplaintId = OrderCompliant::find($id);
        $model = OrderCompliant::with('customer')->where('customer_id', $ComplaintId->customer_id)->get();
        $Customer_info = Customer::where('u_id', $ComplaintId->customer_id)->first();
        // dd($Customer_info);
        return view('complaint.view', compact('model', 'Customer_info'));

    }

    public function complaintviewN($id, $Complaintid)
    {
        // dd($orderid);

        $ComplaintId = OrderCompliant::find($Complaintid);
        $model = OrderCompliant::with('customer')->where('customer_id', $ComplaintId->customer_id)->get();
        $Customer_info = Customer::where('u_id', $ComplaintId->customer_id)->first();

        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        return view('complaint.view', compact('model', 'Customer_info'));


    }

    public function Ordercomplaintstatus(Request $request)
    {
        $model = OrderCompliant::where('id', $request->id)->update(['status' => $request->status]);
        return back();
    }

    public function assignedOrders()
    {

        $model = OrderAssigned::with('rider', 'order')->whereHas('order', function ($query) {
            $query->where('status', 4);
        })->get();
        return view('order.assignedOrder', compact('model'));
    }

    public function OrderHistory()
    {

        $model = Order::where('home_delivery', 1)->whereIn('status', [5, 6, 7])->orwhere(function ($query) {
            $query->where('pickup', 1)->whereIn('status', [4, 6, 7]);
        })->get();


        return view('order.orderhistory', compact('model'));
    }

}
