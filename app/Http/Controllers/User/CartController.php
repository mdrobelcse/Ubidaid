<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Category;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {

        $availableitem = Cart::where('product_id',$request->product_id)
            ->where('user_id',Auth::id())
            ->where('order_id',0)
            ->get();

        $singleshop = Cart::where('user_id',Auth::id())
                           ->where('order_id',0)
                           ->where('order_status','!=',$request->shop_id)
                           ->get();

        if($availableitem->count() > 0){

         //  Toastr::info('product already added' ,'Info');
          // return redirect()->back();
          return redirect()->back()->with('errorMsg','product already added');

        }elseif($singleshop->count() > 0){

             //Toastr::info('you can not buy product from multiple shop at a time' ,'Info');
            // return redirect()->back();
            return redirect()->back()->with('errorMsg','you can not buy product from multiple shop at a time:)');

        }else {

            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = Auth::id();
            $cart->product_quantity = $request->quantity;
            $cart->order_status = $request->shop_id;
            $insert = $cart->save();

           // Toastr::success('product successfully added to your cart' ,'Success');
          //  return redirect()->back();

             return redirect()->back()->with('successMsg','product successfully added to your cart:)');
            

        }


      //return $request->all();
    }


    //view all cart item

    public function allcartitem(){

        $products = Cart::where('user_id',Auth::id())
            ->where('order_id',0)->get();

        if($products->count() > 0){

            return view('user.cart',compact('products'));

        }else{
            
            //Toastr::info('your cart is empty' ,'Info');
            //return redirect()->route('welcome');
            return redirect()->route('welcome')->with('infoMsg','your cart is empty !');
        }


    }


    //remove cart product
    public function removeProduct($id){

        $product = Cart::findOrfail($id);
        $product->delete();
      //  Toastr::success('product successfully remove from your cart' ,'Success');
      //  return redirect()->back();
        return redirect()->back()->with('successMsg','product successfully remove from your cart');
    }

    //update cart quantity
    public function updateQuantity(Request $request,$id){
       $product_quantity = $request->product_quantity;
       if ($product_quantity <= 0){
           //Toastr::info('invalid quantity' ,'Info');
           //return redirect()->back();
            return redirect()->back()->with('infoMsg','invalid quantity!');
       }else{
           $cart = Cart::findOrfail($id);
           $cart->product_quantity = $request->product_quantity;
           $cart->save();
           //Toastr::success('quantity updated successfully' ,'Success');
           //return redirect()->back();
            return redirect()->back()->with('successMsg','quantity updated successfully');
       }
    }




}//end class
