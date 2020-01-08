<?php

namespace App\Http\Controllers\Shop;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $products = Product::where('user_id',Auth::id())->get();
        return view("shop_owner.dashboard",compact('products'));
    }

}//end class
