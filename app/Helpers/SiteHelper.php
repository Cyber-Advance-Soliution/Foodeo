<?php

namespace App\Helpers;

use App\DeliveryStatusList;
use App\PickupStatusList;
use Kreait\Firebase;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\CloudMessage;

class SiteHelper
{
    public static function orderReference($value)
    {
        $orderReference = str_pad($value, 6, "0", STR_PAD_LEFT);

        return strtoupper($orderReference);
    }

    public static function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public static function generateCode($length = 4)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
    }

    public static function getLocation($url, array $options = array())
    {
        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 4
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if (!$result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public static function sendNotification($order, $deviceToken)
    {

        $messaging = (new Firebase\Factory())->createMessaging();

        $orderReference = '#' . SiteHelper::orderReference($order->id);
        if ($order->pickup == 1) {
            $statusModel = PickupStatusList::where('id', $order->status)->first();
            $status = $statusModel->name;
        } else {
            $statusModel = DeliveryStatusList::where('id', $order->status)->first();
            $status = $statusModel->name;
        }

        $title = 'Order Status';
        $body = 'Status for order' . " " . $orderReference . ' is ' . $status . ' now.';

        try {

            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification(Notification::create($title, $body))
                ->withData(['body' => $body]);

            $report = $messaging->send($message);

            echo "OK";
            exit;
        } catch (\Kreait\Firebase\Exception\ApiException $exception) {
            $exception->getRequest()->getBody()->getContents();
        }

    }

    public static function send_notification_FCM($notification_id, $title, $message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $data = [
            "to" => $notification_id,
            "notification" => [
                "title" => $title,
                "body" => $message,
                "badge" => 1,
                "sound" => "default",
                "message" => $message,

            ],
            // "data" =>[
            //   "type" => "event",
            //   "data_body" => [
            //     "event" => $NotifyEvent,
            //   ],
            // ],
        ];

        $encodedData = json_encode($data);
        $headers = [
            'Authorization:key=' . env('FCM_KEY'),
            'Content-Type: application/json',
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);
        // $rest = json_decode($result);
        $result_noti = 1;
        // echo "<pre>"; print_r($rest); exit('ste');
        // if (!empty($rest)) {
        //   if ($rest->success == 1) {
        //       $result_noti = 1;
        //       $notification                 =new Notification;
        //       $notification->user_id        =$user_id;
        //       $notification->event_id       =$event_id;
        //       $notification->title          =$title;
        //       $notification->notification   =$message;
        //       $notification->type           =$type;
        //       $notification->success        =1;
        //       $notification->save();
        //       return true;
        //   } else {
        //       $notification                 =new Notification;
        //       $notification->user_id        =$user_id;
        //       $notification->event_id       =$event_id;
        //       $notification->title          =$title;
        //       $notification->notification   =$message;
        //       $notification->type           =$type;
        //       $notification->success        =0;
        //       $notification->save();
        //       $result_noti = 0;
        //   }
        // }else{
        //   $notification                 =new Notification;
        //   $notification->user_id        =$user_id;
        //   $notification->event_id       =$event_id;
        //   $notification->title          =$title;
        //   $notification->notification   =$message;
        //   $notification->type           =$type;
        //   $notification->success        =0;
        //   $notification->save();
        //   $result_noti = 0;
        // }
        // Close connection
        curl_close($ch);
        return $result_noti;
    }

}
