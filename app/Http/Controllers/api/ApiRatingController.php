<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Rating ;
use App\Product;
use App\Customer;
use App\Http\Controllers\Controller;

class ApiRatingController extends Controller
{
    public function SaveRating(Request $request)
    {
      $data=Product::find($request->product_id);
      $Customer=Customer::where('u_id',$request->uu_id)->first();
     
      if($data && $Customer){
        $req=new Rating();
        $req->rating=$request->rating;
        $req->comment=$request->comment;
        $req->product_id=$request->product_id;
        $req->user_id =$request->uu_id;
        $save=$req->save();
          if ($save) {
              $response = [
          'Message' => 'success',
          'Status' => 1,
          'Data' => null
        ];
        
      }
    }
      else{
        $response = [
          'Message' => 'fail: customer or product not found',
          'Status' => 0,
          'Data' => null
        ];

      }
      
			return response()->json($response);
        }

    
}
