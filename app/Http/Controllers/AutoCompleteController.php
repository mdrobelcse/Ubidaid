<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Product;
use DB;

class AutoCompleteController extends Controller
{
    public function index()
    {
        return view('search.indextwo');
    }
 
  

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('products')
        ->where('product_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
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



    //*******************************

    public function search(){

         return view('search.index');
    }

     function fetchdata(Request $request)
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






}//end class
