<?php

namespace App\Http\Controllers\User;

use App\Product;
use App\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function productbysubcat($id){

       $products = Product::where('subcategory_id',$id)->get();
       return view('user.productbysubcat',compact('products'));

    }

    //all favourite shop

    public function allfavouriteshop(){
         
         $allfavouriteshop = Favourite::where('user_id',Auth::id())->latest()->get();
    	 return view('user.allfavshop',compact('allfavouriteshop'));
    }

}//end class
