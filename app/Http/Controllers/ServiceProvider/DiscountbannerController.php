<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DiscountbannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = User::where('id',Auth::id())->first();
        return view('service_provider.discountbanner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = User::findOrfail($id);
        return view('service_provider.discountbanner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'image',
        ]);
        $image = $request->file('image');
        $banner = User::findOrFail($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            

            if (!file_exists('public/uploads/discountbanner'))
            {
                mkdir('public/uploads/discountbanner',0777,true);
            }

            if($banner->image != 'default.png'){

                unlink('public/uploads/discountbanner/'.$banner->image);
            }

          //  $image->move('public/uploads/discountbanner',$imageName);
              //resize image***********************//


                     $destinationPath = public_path('uploads/discountbanner');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(1300, 520, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

                 /*****************************/
            
        } else {
            $imageName = $banner->image;
        }

        $banner->image = $imageName;
        $banner->save();
       // Toastr::success('Banner Successfully Updated :)','Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','banner succesfully updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
