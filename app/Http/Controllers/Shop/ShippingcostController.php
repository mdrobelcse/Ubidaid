<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;



class ShippingcostController extends Controller
{
    
   public function index()
   {

   	  return view('shop_owner.shippingcost');
   }

   public function update(Request $request)
   {

   	  $this->validate($request,[
            'shipping_cost'=>'required',
            'text' => 'required',
        ]);


        $user = User::findOrFail(Auth::id());
        $user->shipping_cost = $request->shipping_cost;
        $user->text = $request->text;
        $user->save();
        //Toastr::success('Shipping cost updated :)','Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','Shipping cost updated :)');
   }

}//end classs
