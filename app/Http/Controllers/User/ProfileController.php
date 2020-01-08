<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\User;
use App\Reservation;
use App\Cart;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    

  public function index()
  {

  	    return view('user.updateprofile');
  }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone'=>'required | unique:users,phone,'.Auth::user()->id,
            'address'=>'required',
        ]);

        $image = $request->file('profile');
        $user = User::findOrFail(Auth::id());
       
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            

            if (!file_exists('public/uploads/profile'))
            {
                mkdir('public/uploads/profile',0777,true);
            }

            if($user->profile != 'default.png'){

                unlink('public/uploads/profile/'.$user->profile);
            }

            $image->move('public/uploads/profile',$imageName);
            
        } else {
            $imageName = $user->profile;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->profile = $imageName;
        $user->save();
        //Toastr::success('Profile Successfully Update :)','Success');
        //return redirect()->back();
        return redirect()->route('user.dashboard')->with('successMsg','profile Successfully update :)');


    }


    //view all order


    public function vieworder($id)
    {

        $allproductforsingleorder = Cart::where('order_id',$id)->get();
        return view('user.order.singleproduct',compact('allproductforsingleorder'));
    }

    public function viewreservation($id)
    {
          
        $allreservation = Reservation::where('id',$id)->get();
        return view('user.reservation.singlereservation',compact('allreservation'));
    }


}//end classs
