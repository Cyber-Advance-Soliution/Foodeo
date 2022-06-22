<?php

namespace App\Http\Controllers\api;

use App\Wallet;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiWalletController extends Controller
{
    public function walllet(Request $request)
    {
        $walletblance=0;
        $model=Wallet::where('customer_id',$request->uu_id)->get();
     
        
            foreach ($model as $item) {
                $walletblance+=$item->debit-$item->credit;
                
            }
            $response=[
                'message'=>'current blance',
                'status'=>1,
                'data'=>[
                    'current-balance'=>$walletblance
                ]
            ];
       
        return response()->json($response);
    }
}
