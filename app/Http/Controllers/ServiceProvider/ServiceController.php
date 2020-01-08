<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Service;
use App\Product;
use App\ProductPhoto;
use App\Category;
use App\ServiceType;
use App\Subcategory;
use Carbon\Carbon;
use App\ServicePhoto;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::where('user_id',Auth::id())->get();
        return view('service_provider.services.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        $categories = Category::where('servicetype_id',1)->get();
        $subcategories = Subcategory::all();
        return view('service_provider.services.create',compact('categories','subcategories'));
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

            'product_name'=>'required',
            'price'=>'required',
            'photos' => 'required',
            'category'=>'required',
            'subcategory'=>'required',
            'pro_type'=>'required',
            'product_details'=>'required',

        ]);

          //$image = $request->file('images');
            $slug = str_slug($request->product_name);


            $product = new Product();
            $product->user_id = Auth::id();
            $product->product_name = $request->product_name;
            $product->slug = $slug;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->pro_type = $request->pro_type;
            $product->product_details = $request->product_details;
            $product->save();
        
             foreach ($request->photos as $photo)
             {
     
                 $currentDate = Carbon::now()->toDateString();
                 $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
     
                if (!file_exists('public/uploads/product'))
                 {
                     mkdir('public/uploads/product',0777,true);
                 }
                // $photo->move('public/uploads/product',$filename);
                   //resize image***********************//


                     $destinationPath = public_path('uploads/product');

                     $resize_image = Image::make($photo->getRealPath());

                     $resize_image->resize(250, 250, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $filename);

                    

                 /*****************************/
     
                 $productphoto = new ProductPhoto;
                 $productphoto->product_id = $product->id;
                 $productphoto->filename   = $filename;
                 $productphoto->save();
             }
     
             //return redirect()->route('project.index')->with('success','Student Created successfully');

            // return redirect()->route('service_provider.service.index');
             return redirect()->route('service_provider.service.index')->with('successMsg','service succesfully added :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrfail($id);
        $productimages = ProductPhoto::where('product_id',$id)->get();
        return view('service_provider.services.view',compact('product','productimages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);
        //$categories = Category::all();
        $categories = Category::where('servicetype_id',1)->get();
        $subcategories = Subcategory::all();
        return view('service_provider.services.edit',compact('product','categories','subcategories'));
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

            'product_name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'pro_type'=>'required',
            'product_details'=>'required',

        ]);



            $product = Product::findOrfail($id);
            $productphotos = ProductPhoto::where('product_id',$id)->get();

            //  $input = $request->all();


            $slug = str_slug($request->product_name);


        
            $product->user_id = Auth::id();
            $product->product_name = $request->product_name;
            $product->slug = $slug;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->pro_type = $request->pro_type;
            $product->product_details = $request->product_details;
            $product->save();



        
            if(isset($request->photos)){
                foreach ($productphotos as $productphoto) {
                    
                    $productphoto->delete();
                    unlink('public/uploads/product/'.$productphoto->filename);
            }
                foreach ($request->photos as $photo) {
                
                    $currentDate = Carbon::now()->toDateString();
                    $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
                    if (!file_exists('public/uploads/product'))
                    {
                        mkdir('public/uploads/product',0777,true);
                    }
                   // $photo->move('public/uploads/product',$filename);

                      //resize image***********************//


                     $destinationPath = public_path('uploads/product');

                     $resize_image = Image::make($photo->getRealPath());

                     $resize_image->resize(250, 250, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $filename);

                    

                 /*****************************/



                    $productphoto = new ProductPhoto;
                    $productphoto->product_id = $product->id;
                    $productphoto->filename   = $filename;
                    $productphoto->save();
                }
            }    
            // $service->update($input);
              //  return redirect()->route('service_provider.service.index');
            return redirect()->route('service_provider.service.index')->with('successMsg','service succesfully updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        $productphotos = ProductPhoto::where('product_id',$id)->get();
        foreach ($productphotos as $productphoto) {
        	 $productphoto->delete();
        	 unlink('public/uploads/product/'.$productphoto->filename);
        }
        $product->delete();
        //return redirect()->route('service_provider.service.index');
        return redirect()->back()->with('successMsg','product succesfully deleted :)');
    }
}
