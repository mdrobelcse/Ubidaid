<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notification;

class NotificationController extends Controller
{
    
  public function index($id)
  {
      
       $notifications = Notification::where('user_id',$id)->latest()->get();
       $notification = Notification::where('user_id', $id)
                ->update(['status' => 1]);
  	   return view('user.allnotification',compact('notifications'));
  }

}//end class
