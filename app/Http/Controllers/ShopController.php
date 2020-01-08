<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::where('typeofservice','LIKE',"%$search%")->get();
        return view('searchableshop',compact('users'));

    }

    public function shopbyid($id)
    {
        $user = User::where('id',$id)->first();
        $products = Product::where('user_id',$id)->get();
        $categories = Category::all();
        return view('shop',compact('user','products','categories'));
    }

    public function productbysubcat($id){

       $products = Product::where('subcategory_id',$id)->get();
       return view('user.productbysubcat',compact('products'));

    }
}
