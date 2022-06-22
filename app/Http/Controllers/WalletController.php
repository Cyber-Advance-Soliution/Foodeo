<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
 
class WalletController extends Controller
{
    
    public function DebitWallet(Request $request)
    {
        $model=Customer::find($request->id);
        // dd($model);
        if($model){
        return view('wallet.add',compact('model'));

        }else{
            return back();
        }
    }
    public function store(Request $request)
    {
        // dd($request);
       $model=new Wallet();
       $model->debit= $request->debit;
       $model->blance= $request->debit;
        $model->customer_id= $request->u_id;
        $save=$model->save();
        if($save){
            Session::Flash('success','Debit successfully');

        }
        else{
            Session::Flash('success','does not debit');
        }
        return redirect('customer');
    }
        public function EditWallet(Request $request)
        {
            
            $req=Customer::find($request->id);
            if(!$req){
                return back();
            }else{
                $model=Wallet::where('customer_id',$req->u_id)->first();
                if(!$model){
                    return back();
                }else{
                return view('wallet.edit',compact('model'));

                }
            }

        }
        public function update(Request $request)
        {
          
        $model= Wallet::find($request->walletid);
        if(!$model){
            return back();
        }
        $model->debit= $request->debit;
        $model->blance= $request->debit;
        $model->customer_id= $request->u_id;

        $save=$model->save();
        
        if($save){
            Session::Flash('success','Edit successfully');

        }
        else{
            Session::Flash('success','does not Edit');
        }
        return redirect('customer');
        }
}
