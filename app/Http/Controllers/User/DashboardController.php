<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Reservation;



class DashboardController extends Controller
{
    public function index()
    {
         //$allproductbyuserid = Cart::where('user_id',Auth::id())->get();
        $allorderbyuserid = Order::where('user_id',Auth::id())->latest()->get();
    	//$allorderbyuserid = Order::where('user_id',6)->get();


        //************************
        //$allproductbyorderid = Cart::where('order_id',$id)->get();
        //$order_details = Order::where('id',$id)->first();
        //return view('shop_owner.order.view',compact('allproductbyorderid','order_details'));
        //************************




    	$allreservationbyuserid = Reservation::where('user_id',Auth::id())->latest()->get();
        return view('user.dashboard',compact('allorderbyuserid','allreservationbyuserid'));
    }

}//end class
