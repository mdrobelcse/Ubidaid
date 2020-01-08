<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class ProductphotoController extends Controller
{
    public function index(){

    	 return view('photo.create');
    }
    
    public function store(Request $request){


		     $this->validate($request, [
		      'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		     ]);

		     $image = $request->file('image');

		     $image_name = time() . '.' . $image->getClientOriginalExtension();

		     $destinationPath = public_path('uploads/product');

		     $resize_image = Image::make($image->getRealPath());

		     $resize_image->resize(150, 150, function($constraint){
		      $constraint->aspectRatio();
		     })->save($destinationPath . '/' . $image_name);

		     //$destinationPath = public_path('/images');

		     //$image->move($destinationPath, $image_name);

		     return back()
		       ->with('success', 'Image Upload successful')
		       ->with('imageName', $image_name);

    }    

}//end
