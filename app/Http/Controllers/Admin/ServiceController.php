<?php

namespace App\Http\Controllers\Admin;

use App\Servicetype;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Servicetype::latest()->get();
        return view('admin.service_type.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | unique:servicetypes,name',
            'image' => 'required | mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/servicetype'))
            {
                mkdir('public/uploads/servicetype',0777,true);
            }
            //$image->move('public/uploads/servicetype',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/servicetype');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(350, 350, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/
        } else {
            $imageName = "default.png";
        }

        $servicetype = new Servicetype();
        $servicetype->name = $request->name;
        $servicetype->image = $imageName;
        $servicetype->slug = $slug;
        $servicetype->save();
        //Toastr::success('Type fo Service Successfully Saved :)' ,'Success');
        //return redirect()->route('admin.service.index');
        return redirect()->route('admin.service.index')->with('successMsg','type fo service successfully saved :)');


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
        $service = Servicetype::findOrfail($id);
        return view('admin.service_type.edit',compact('service'));
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
            'name' => 'required | unique:servicetypes,name,'.$id,
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $service_type = Servicetype::findOrfail($id);
        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/servicetype'))
            {
                mkdir('public/uploads/servicetype',0777,true);
            }
            unlink('public/uploads/servicetype/'.$service_type->image);
           // $image->move('public/uploads/servicetype',$imageName);
             //resize image***********************//


                     $destinationPath = public_path('uploads/servicetype');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(350, 350, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/

           
        } else {
            $imageName = $service_type->image;
        }

        $service_type->name = $request->name;
        $service_type->image = $imageName;
        $service_type->slug = $slug;
        $service_type->save();
        //Toastr::success('Type fo Service Successfully Updated :)' ,'Success');
        //return redirect()->route('admin.service.index');
        return redirect()->route('admin.service.index')->with('successMsg','type fo service successfully updated :)');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $service = Servicetype::findOrfail($id);
        if (file_exists('public/uploads/servicetype/'.$service->image))
        {
            unlink('public/uploads/servicetype/'.$service->image);
        }
        $service->delete();
       // Toastr::success('Type Of Service Successfully Deleted :)' ,'Success');
       // return redirect()->back();
        return redirect()->back()->with('successMsg','type fo service successfully deleted :)');
    }
}
