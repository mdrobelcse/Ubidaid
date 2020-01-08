<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    public function index()
    {
        return view('admin.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('welcome')->with('successMsg','Password Successfully Changed');

            } else {
                return redirect()->back()->with('errorMsg','New password cannot be the same as old password.');
            }
        } else {
            return redirect()->back()->with('errorMsg','Current password not match.');
        }
    }

}//end class
