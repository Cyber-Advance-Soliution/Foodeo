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
        if ($request->has('u_id'))
        {
            $customer = Customer::where('u_id', $request->u_id)->first();
            $unReadNotifications = $customer->unreadNotifications()->latest()->take(20)->get();

//        foreach ($customer->unreadNotifications as $notification) {
            if ($unReadNotifications->count() > 0) {
                foreach ($unReadNotifications as $notification) {
                    if (isset($notification->data['neworder'])) {
                        $data[] = $notification['data']['neworder'];
                    }elseif (isset($notification->data['canceleOrder'])){
                        $data[] = $notification['data']['canceleOrder'];
                    }elseif (isset($notification->data['orderComplaint'])){
                        $data[] = $notification['data']['orderComplaint'];
                    }
                }
            } else {
                $data = null;
            }
//        dd($customer->unreadNotifications->count(),$data,$customer->unreadNotifications());
            $response = [
                'Message' => 'success',
                'Status' => 1,
                'Data' => $data
            ];
        }else{
            $response = [
                'Message' => 'u_id is required to get notifications',
                'Status' => 0,
            ];
        }
        return response()->json($response);
    }
}
