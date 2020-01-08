<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class ProductController extends Controller
{ 


	public function fetchdata(Request $request)
	{

             if($request->get('query'))
		     {
		      $query = $request->get('query');
		      $data = DB::table('products')
		        ->where('product_name', 'LIKE', "%{$query}%")
		        ->get();
		      $output = '<ul class="searchresult">';
		      foreach($data as $row)
		      {
		       $output .= '
		       <li><a href="#">'.$row->product_name.'</a></li>
		       ';
		      }
		      $output .= '</ul>';
		      echo $output;
		     }
	}

	//search data

	public function searchproduct(Request $request)
	{

		$product = $request->product;
        $shops = Product::where('product_name','LIKE',"%$product%")->get();
        //return $products;
         return view('searchableshop',compact('shops'));
	}

}//end
