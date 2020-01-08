<?php

namespace App\Http\Controllers\User;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productbyCat($id)
    {
       $products = Product::where('category_id',$id)->get();
       return view('productbycat',compact('products'));
    }


}//end
