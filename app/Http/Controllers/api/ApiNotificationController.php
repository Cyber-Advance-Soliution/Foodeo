<?php

namespace App\Http\Controllers\api;

use App\Auth;
use App\Customer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiNotificationController extends Controller
{
    public function OneWeekUnreadNotification(Request $request): \Illuminate\Http\JsonResponse
    {
//        dd($request->all(),$request->u_id);
//        $unReadNotifications = Auth::user()->notifications();
        $customer = Customer::where('u_id',$request->u_id)->first();
        $unReadNotifications = $customer->unreadNotifications()->latest()->take(20)->get();

//        foreach ($customer->unreadNotifications as $notification) {
        if ($unReadNotifications->count()>0) {
            foreach ($unReadNotifications as $notification) {
                if (isset($notification->data['neworder'])) {
                    $data[] = $notification['data']['neworder'];
                }
            }
        }else{
            $data = 'No New Notifications';
        }
//        dd($customer->unreadNotifications->count(),$data,$customer->unreadNotifications());
        $response = [
            'Message' => 'success',
            'Status' => 1,
            'Data' => $data
        ];

        return response()->json($response);
    }
}
