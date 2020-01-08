<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     public static function allnotification($id)
    {
       $allnotification =  Notification::where('user_id',$id)->where('status',0)->get();
       return $allnotification;
    }


    public function user()
    {

    	  return $this->belongsTo('App\User');
    }


}//end class
