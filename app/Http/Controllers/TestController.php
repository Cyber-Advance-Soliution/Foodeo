<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use SiteHelper;
use Kreait\Firebase;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\CloudMessage;

class TestController extends Controller
{
    public function index()
	{
		$deviceToken = 'cjrk6EsS7XA:APA91bFNRPoP5La1dLUE06y1WKt6nFSJyVQ84382ZqEkBrZDIF7NYYaBtJQ6l1FLyRWheV7BnwT5xC0J7jd2kGEiB8OL5SGggIoXnJufTXvmdsGhQVaInQaI2CTY7YTd1tT6X6DoPkXv';

		$orderReference = '#' . SiteHelper::orderReference(1);
		$status = 'Accepted';
		
		SiteHelper::sendNotification($orderReference, $status, $deviceToken);
	}
	
	public function password()
	{
		return Hash::make('pak123');
	}
}
