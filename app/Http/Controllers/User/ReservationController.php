<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

 use App\Reservation;
 use App\Notification;
 use App\Paymentnumber;
 use App\PaymentName;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;



class ReservationController extends Controller
{
    
  public function index(Request $request,$id)
  {
  	// echo "quantity".$quantity = $request->quantity;
  	// echo "product id".$product_id = $request->product_id;
  	// echo "user id".$user_id = $id;

	  	$quantity = $request->quantity;
	  	$product_id = $request->product_id;
	  	$user_id = $id;

	  	$paymentmethods = PaymentName::all();
        $paymentnumbers = Paymentnumber::where('user_id',$user_id)->get();

	  	return view('user.reservation.reserveform',compact('quantity','product_id','user_id','paymentmethods','paymentnumbers'));
  }

  public function reservation(Request $request)
  {

        $this->validate($request,[
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required',
            'shipping_address' => 'required',
            'payment_method' => 'required',
            'transanction_id' => 'required',
        ]);



        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->shipping_address = $request->shipping_address;
        $reservation->payment_method = $request->payment_method;
        $reservation->transanction_id = $request->transanction_id;
        $reservation->quantity = $request->quantity;
        $reservation->product_id = $request->product_id;
        $reservation->shop_id = $request->user_id;
        $reservation->user_id = Auth::id();
        $reservation->save();




         //send notification to user
         
         $notification = new Notification();
         $notification->user_id = Auth::id(); 
         $notification->notification = 'You have been successfully completed your reservation process...'.'reservation id is:#9901'.$reservation->id;   
         $notification->save();

              
       // Toastr::success('Order completed successfully,we will contact with you as soon as possible:)' ,'Success');
        //return redirect()->route('welcome');

        return redirect()->route('welcome')->with('successMsg','thanks for your order,we will contact with you as soon as possible :)');   



  }


}//end classs
