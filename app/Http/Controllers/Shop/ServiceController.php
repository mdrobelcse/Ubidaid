<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\ServiceType;
use App\Subcategory;
use Carbon\Carbon;
use App\ServicePhoto;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $services = Service::latest()->get(); 
        return view('shop_owner.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('shop_owner.services.create',compact('categories','subcategories'));
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

            'service_name'=>'required',
            'price'=>'required',
            'photos' => 'required',
            'category'=>'required',
            'subcategory'=>'required',
            'service_type'=>'required',
            'service_details'=>'required',

        ]);

          //$image = $request->file('images');
            $slug = str_slug($request->service_name);


            $service = new Service();
            $service->user_id = Auth::id();
            $service->service_name = $request->service_name;
            $service->slug = $slug;
            $service->price = $request->price;
            $service->category_id = $request->category;
            $service->subcategory_id = $request->subcategory;
            $service->service_type = $request->service_type;
            $service->service_details = $request->service_details;
            $service->save();
        
             foreach ($request->photos as $photo)
             {
     
                 $currentDate = Carbon::now()->toDateString();
                 $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
     
                if (!file_exists('public/uploads/services'))
                 {
                     mkdir('public/uploads/services',0777,true);
                 }
                 $photo->move('public/uploads/services',$filename);
     
                 $servicePhoto = new ServicePhoto;
                 $servicePhoto->service_id = $service->id;
                 $servicePhoto->filename   = $filename;
                 $servicePhoto->save();
             }
     
             //return redirect()->route('project.index')->with('success','Student Created successfully');

             return redirect()->route('shop.services.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $service = Service::findOrfail($id);
        $servicesimages = ServicePhoto::where('service_id',$id)->get();
        return view('shop_owner.services.view',compact('service','servicesimages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrfail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('shop_owner.services.edit',compact('service','categories','subcategories'));
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

            'service_name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'service_type'=>'required',
            'service_details'=>'required',

        ]);



        $service = Service::findOrfail($id);
        $servicephotos = ServicePhoto::where('service_id',$id)->get();

      //  $input = $request->all();


      $slug = str_slug($request->service_name);


  
      $service->user_id = Auth::id();
      $service->service_name = $request->service_name;
      $service->slug = $slug;
      $service->price = $request->price;
      $service->category_id = $request->category;
      $service->subcategory_id = $request->subcategory;
      $service->service_type = $request->service_type;
      $service->service_details = $request->service_details;
      $service->save();



 
      if(isset($request->photos)){
        foreach ($servicephotos as $servicephoto) {
        	 
            $servicephoto->delete();
            unlink('public/uploads/services/'.$servicephoto->filename);
       }
        foreach ($request->photos as $photo) {
           
            $currentDate = Carbon::now()->toDateString();
            $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
            if (!file_exists('public/uploads/services'))
            {
                mkdir('public/uploads/services',0777,true);
            }
            $photo->move('public/uploads/services',$filename);
            $servicephoto = new ServicePhoto;
            $servicephoto->service_id = $service->id;
            $servicephoto->filename   = $filename;
            $servicephoto->save();
        }
    }    
       // $service->update($input);
        return redirect()->route('shop.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrfail($id);
        $servicephotos = ServicePhoto::where('service_id',$id)->get();
        foreach ($servicephotos as $servicephoto) {
        	 $servicephoto->delete();
        	 unlink('public/uploads/services/'.$servicephoto->filename);
        }
        $service->delete();
        return redirect()->route('shop.services.index');
    }
}
