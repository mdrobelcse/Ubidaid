<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\User;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;




class ProfileController extends Controller
{
     
    public function profile()
    {
        return view('service_provider.profile');
    }

    // public function profileUpdate(Request $request)
    // {
    //     $this->validate($request,[
    //         'name'=>'required',
    //         'email' => 'required|email|unique:users,email,'.Auth::user()->id,
    //         'phone'=>'required | unique:users,phone,'.Auth::user()->id,
    //         'address'=>'required',
    //     ]);


    //     $user = User::findOrFail(Auth::id());
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->address = $request->address;
    //     $user->save();
    //     return redirect()->back()->with('successMsg','profile succesfully updated :)');
    // }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'owner_name'=>'required',
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
            

            if (!file_exists('public/uploads/shopbanner'))
            {
                mkdir('public/uploads/shopbanner',0777,true);
            }

            if($user->profile != 'default.png'){

                unlink('public/uploads/shopbanner/'.$user->profile);
            }

            $image->move('public/uploads/shopbanner',$imageName);
            
        } else {
            $imageName = $user->profile;
        }


        $user->name = $request->name;
        $user->owner_name = $request->owner_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->profile = $imageName;
        $user->save();
        //Toastr::success('Profile Successfully Update :)','Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','profile Successfully update :)');


    }


}//end class
