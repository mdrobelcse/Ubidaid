<?php

namespace App\Http\Controllers\Auth;

use App\Servicetype;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
         /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if (Auth::check() && Auth::user()->role->id == 2) {

            $this->redirectTo = route('shop.dashboard');

        }elseif (Auth::check() && Auth::user()->role->id == 3) {

            $this->redirectTo = route('service_provider.dashboard');

        }else{

            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {

        $servicetypes = Servicetype::all();
        return view('auth.register',compact('servicetypes'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
          //  'owner_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>'required|unique:users,phone',
            'address'=>'required',
            'role_id'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {     


             return User::create([
                'role_id' => $data['role_id'],
                'name' => $data['name'],
                'owner_name' => $data['owner_name'], 
                'username' => str_slug($data['name']),
                'email' => $data['email'],
                'phone' => $data['phone'],
                'image' => 'default.png',
                'address' => $data['address'],
                'password' => Hash::make($data['password']),
            ]);
 
            

    }//end method


    // protected function register(Request $request)
    // {

    //    $ownername = $request->owner_name;


    //    if ($ownername == '') {
    //           $user = User::create([

    //             'role_id' => $request->role_id,
    //             'name' => $request->name,
    //             'username' => str_slug($request->name),
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'image' => 'default.png',
    //             'address' => $request->address,
                
    //             'password' => Hash::make($request->password),

    //         ]);
    //    }else{

    //        $user = User::create([

    //             'role_id' => $request->role_id,
    //             'name' => $request->name,
    //             'owner_name' => $request->owner_name,
    //             'username' => str_slug($request->name),
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'image' => 'default.png',
    //             'address' => $request->address,
    //             'password' => Hash::make($request->password),

    //       ]);
    //    }

    //     return redirect('register');;


    // }



}//end class
