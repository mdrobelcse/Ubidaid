<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Notification;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class OrderController extends Controller
{
    public function index()
    {

        $allorders = Order::where('shop_id',Auth::id())->latest()->get();
        return view('shop_owner.order.index',compact('allorders'));
    }

    public function view($id)
    {
        $allproductbyorderid = Cart::where('order_id',$id)->get();
        $order_details = Order::where('id',$id)->first();
        return view('shop_owner.order.view',compact('allproductbyorderid','order_details'));
    }

    public function orderconfirm(Request $request,$id)
    {
        $order = Order::find($id);
        $order->order_status = 1;
        $user_id = $order->user_id;
        $order->save();
       // Toastr::success('Order confirm Successfully:)' ,'Success');
       // return redirect()->back();


        
         //send notification to user

        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->notification = 'shop owner accepted your recent order..'.'order id is:#8801'.$id;
        $notification->save();
        

        return redirect()->back()->with('successMsg','order confirm successfully:)');
    }

    public function orderdestroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        $cart = Cart::where('order_id',$id)->delete();
        //Toastr::success('Order Successfully Deleted:)' ,'Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','order deleted successfully:)');
    }

    public function ordercomplete($id)
    {
        $order = Order::find($id);
        $order->order_status = 2;
        $user_id = $order->user_id;
        $order->save();




        //send notification to user

        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->notification = 'your recent order completed successfully..'.'order id is:#8801'.$id;
        $notification->save();



        //Toastr::success('Order completed Successfully:)' ,'Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','order completed successfully:)');
    }


}//end class
