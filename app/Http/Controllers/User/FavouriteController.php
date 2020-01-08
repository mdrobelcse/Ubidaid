<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Favourite;


class FavouriteController extends Controller
{
    
   public function addtofavourite(Request $request,$id)
   {     

         $duplicate_fav = Favourite::where('user_id',Auth::id())->where('shop_id',$id)->get();
         if ($duplicate_fav->count() > 0) {

         	return redirect()->back()->with('infoMsg','shop already added to your favourite list:)');

         }else{


          $favourite = new Favourite();
          $favourite->shop_id = $id;
          $favourite->user_id = Auth::id();
          $favourite->save();
          return redirect()->back()->with('successMsg','shop added to your favourite list:)');

        }
   }


}//end class
