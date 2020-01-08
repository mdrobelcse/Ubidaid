<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class SearchCountry extends Controller
{
    public function index()
    {
    	return view('search.index');
    }

    public function searchcountryresult(Request $request)
    {
         $countries = Country::all();
         $output = '';
         $output = '<ul>';
         if ($countries > 0) {
         	 
         	 foreach ($countries as $country) {
         	 	
         	 	 $output .='<li>'.$country->country.'</li>';
         	 }
         }
         else
         {
         	$output .='<li>Country not found</li>';
         }
         $output .= '</ul>';
         echo $output;
    }

}//end class
