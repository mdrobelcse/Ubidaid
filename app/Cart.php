<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }



    //
    public static function allproductsbyorderid($id)
    {
       $allproducts =  Cart::where('order_id',$id)->get();
       return $allproducts;
    }

}//end class
