<?php

namespace App\Http\Controllers\User;

use App\Mail\User\Sendrestlinkemail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class ForgotpasswordController extends Controller
{
    public function showlinkrequestform()
    {
         return view('user.password_reset.email');
    }

    public function sendResetLinkEmail(Request $request)
    {


//MAIL_DRIVER=smtp
//MAIL_HOST=smtp.googlemail.com
//MAIL_PORT=465
//MAIL_USERNAME=mdrobelahmedcse@gmail.com
//MAIL_PASSWORD=Robelcse@61
//MAIL_ENCRYPTION=ssl


        $this->validateEmail($request);
        $user = User::select('email','username','id')->where('email','=',$request->email)->first();


//        $details = [
//            'username' => $user['username'],
//        ];


        if($user->count() >0){

            Mail::to($user)->send(new Sendrestlinkemail($user));

            $token = str_random(20);

            DB::table('users')
                ->where('email', $request->email)
                ->update(['remember_token' =>$token]);

            return redirect()->back()->with('successMsg','we sent an email,please check your meail :)');

        }else{

            return redirect()->back()->with('errorMsg','we can not find the email to our records');
        }


    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function showResetForm($id)
    {

        $user_id  =$id;
        return view('user.password_reset.reset',compact('user_id'));
    }

    public function reset(Request $request)
    {
        $this->validate($request,[

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = User::where('id',$request->id)->first();

        if($user->remember_token!=null){


            DB::table('users')
                ->where('id', $request->id)
                ->update(['password' =>Hash::make($request->password),'remember_token'=>null]);


            $userdata = array(
                'id'     => Input::get('id'),
                'password'  => Input::get('password')
            );


            if (Auth::attempt($userdata)) {


                if ($user->role_id == 1)
                {
                    return redirect()->route('admin.dashboard')->with('successMsg','Password Successfully Reset');

                } elseif ($user->role_id == 2) {

                    return redirect()->route('shop.dashboard')->with('successMsg','Password Successfully Reset');

                }elseif ($user->role_id == 3) {

                    return redirect()->route('service_provider.dashboard')->with('successMsg','Password Successfully Reset');

                }else{

                     $this->redirectTo = route('user.dashboard');
                }

            } else {

                return redirect()->route('login');

            }

        }else{

            return redirect()->back()->with('errorMsg','Password Already Reset');

        }





    }

}//end class
