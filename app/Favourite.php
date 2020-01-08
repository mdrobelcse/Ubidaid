<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    
    public static function allfavshop($id)
    {
       $allfavshop =  Favourite::where('user_id',$id)->get();
       return $allfavshop;
    }


    public function shop()
    {
        return $this->belongsTo('App\User');
    }

     public static function checkexistingfavlist($userid,$shopid)
    {
       $fav =  Favourite::where('user_id',$userid)->where('shop_id',$shopid)->first();
       return $fav;
    }

    


}//end class
