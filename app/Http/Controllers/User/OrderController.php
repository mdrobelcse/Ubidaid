<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Notification;
use App\Order;
use App\PaymentName;
use App\Paymentnumber;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout($id)
    {
        $paymentmethods = PaymentName::all();
        $paymentnumbers = Paymentnumber::where('user_id',$id)->get();
        $user = User::where('id',$id)->first();
        return view('user.checkout',compact('paymentmethods','paymentnumbers','user'));

    }

    public function findnumber($id)
    {
        $paymentnumber = Paymentnumber::where('payment_name_id',$id)->get();
        return response()->json($paymentnumber);

    }

    public function order(Request $request)
    {
         $this->validate($request,[

             'name'=>'required',
             'email' => ['required', 'string', 'email', 'max:255'],
             'phone'=>'required',
             'shipping_address'=>'required',
             'payment_method'=>'required', 
             'transanction_id'=>'required',  

         ]);

         $order = new Order();
         $order->user_id = Auth::id();
         $order->payment_method = $request->payment_method;
         $order->name = $request->name;
         $order->email = $request->email;
         $order->phone = $request->phone;
         $order->shipping_address = $request->shipping_address;
         $order->transanction_id = $request->transanction_id;
         $order->shop_id = $request->shop_id;
         $order->save();

         $cart = Cart::where('user_id', Auth::id())
                ->where('order_id',0)
                ->update(['order_id' => $order->id]);
         //return redirect()->route('user.successmsg');


         //send notification to user
         
         $notification = new Notification();
         $notification->user_id = Auth::id(); 
         $notification->notification = 'You have been successfully completed your order process...'.'order id is:#8801'.$order->id;   
         $notification->save();

              

         

        return redirect()->route('welcome')->with('successMsg','thanks for your order,we will contact with you as soon as possible :)');        
    }



    public function demo_checkout($id){

        $paymentmethods = PaymentName::all();
        $paymentnumbers = Paymentnumber::where('user_id',$id)->get();
        $user = User::where('id',$id)->first();
        return view('user.demo_checkout',compact('paymentmethods','paymentnumbers','user'));
    }

    public function successmessage(){

        Toastr::success('thanks for your order,we will contact with you as soon as possible' ,'Success');
        return redirect()->route('welcome');
    }


    //user transanction history

    



}//end class
