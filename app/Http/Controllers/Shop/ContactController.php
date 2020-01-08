<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contact;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    
   public function index()
   {
      
      $contacts = Contact::where('user_id',Auth::id())->latest()->get();
   	  return view('shop_owner.contact.index',compact('contacts'));
   }

   public function edit($id)
   {
 
   //	Toastr::success('Post Successfully Saved :)' ,'Success');
   }

   public function view($id)
   {  
     
      $contact = Contact::findOrfail($id);
      return view('shop_owner.contact.view',compact('contact'));
   }

   public function destroy($id)
   {
      $contact = Contact::findOrfail($id);
      $contact->delete();
      //Toastr::success('Contact successfully deleted :)' ,'Success');
      //return redirect()->back();
      return redirect()->back()->with('successMsg','contact succesfully deleted :)');
   }


}//end class
