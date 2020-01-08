<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone'=>'required|unique:users,phone,'.Auth::user()->id,
            'address'=>'required',
        ]);


        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        //Toastr::success('Profile Successfully Update :)','Success');
        //return redirect()->back();
         return redirect()->back()->with('successMsg','Profile Successfully Update :)');
    }
}//end clas
