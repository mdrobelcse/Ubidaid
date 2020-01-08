<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Shopinfo; 

use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    
   public function index($id)
   {
      
        $shopid = $id;

        $shopinfo = Shopinfo::where('user_id',$shopid)->first();
   	  return view('contact',compact('shopid','shopinfo'));
   }

   public function sendMessage(Request $request)
   {

   	   $this->validate($request,[
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => 'required',
            'message' => 'required',
        ]);


   	   $contact = new Contact();
   	   $contact->user_id = $request->user_id;
   	   $contact->name = $request->name;
   	   $contact->slug = str_slug($request->name);
   	   $contact->email = $request->email;
   	   $contact->subject = $request->subject;
   	   $contact->message = $request->message;
   	   $contact->save();
   	   //Toastr::success('Message sent successfully:)' ,'Success');
   	   //return redirect()->route('welcome');
         return redirect()->route('welcome')->with('successMsg','Message sent successfully:)');
   }



}//end class
