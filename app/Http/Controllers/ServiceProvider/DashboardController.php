<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
   public function index()
   {

       return view('service_provider.dashboard');
   }

}//end class
