<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Product;
use App\ServiceType;
use App\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\ProductPhoto;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id',Auth::id())->get();
        return view('shop_owner.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       // $categories = Category::all();
      
        $categories = Category::where('servicetype_id',2)->Orwhere('servicetype_id',3)->get();
        $subcategories = Subcategory::all();
        return view('shop_owner.product.create',compact('categories','subcategories'));
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
            'quantity'=>'required',
            // 'image_name' => 'required | mimes:jpeg,jpg,bmp,png',
            'photos' => 'required',
            'category'=>'required',
            'subcategory'=>'required',
            'product_type'=>'required',
            'product_details'=>'required',

        ]);


           // $image = $request->file('photos');

            $slug = str_slug($request->product_name);


            $product = new Product();
            $product->user_id = Auth::id();
            $product->product_name = $request->product_name;
            $product->slug = $slug;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->pro_type = $request->product_type;
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
                 //$photo->move('public/uploads/product',$filename);

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

             //return redirect()->route('shop.product.index');

             return redirect()->route('shop.product.index')->with('successMsg','product succesfully added :)');


        // $image_name = $request->file('image_name');
        // $slug = str_slug($request->product_name);

        // if(isset($image_name))
        // {
        //     //make unipue name for image
        //     $currentDate = Carbon::now()->toDateString();
        //     $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image_name->getClientOriginalExtension();
        //     if (!file_exists('public/uploads/product'))
        //     {
        //         mkdir('public/uploads/product',0777,true);
        //     }
        //     $image_name->move('public/uploads/product',$imageName);
        // } else {
        //     $imageName = "default.png";
        // }
        // $product = new Product();
        // $product->user_id = Auth::id();
        // $product->product_name = $request->product_name;
        // $product->slug = $slug;
        // $product->quantity = $request->quantity;
        // $product->price = $request->price;
        // $product->image_name = $imageName;
        // $product->category_id = $request->category;
        // $product->subcategory_id = $request->subcategory;
        // $product->pro_type = $request->product_type;
        // $product->product_details = $request->product_details;
        // $product->save();
        // Toastr::success('Product Successfully Saved :)','Success');
        // return redirect()->route('shop.product.index');


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
       // $categories = Category::all();
        $categories = Category::where('servicetype_id',2)->Orwhere('servicetype_id',3)->get();
        $subcategories = Subcategory::all();
        $product = Product::find($id);
        return view('shop_owner.product.edit',compact('categories','subcategories','product'));
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
            'quantity'=>'required',
            // 'image_name' => 'required | mimes:jpeg,jpg,bmp,png',
            // 'photos' => 'required',
            'category'=>'required',
            'subcategory'=>'required',
            'product_type'=>'required',
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
            $product->quantity = $request->quantity;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->pro_type = $request->product_type;
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
                    //$photo->move('public/uploads/product',$filename);

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
            // return redirect()->route('shop.product.index');
            return redirect()->route('shop.product.index')->with('successMsg','product succesfully updated :)');

      

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
        //return redirect()->back();
        return redirect()->back()->with('successMsg','product succesfully deleted :)');

    }

    //subcategory found by subcategory

    public function findsubcategory($id)
    {

           $subcategory = Subcategory::where('category_id',$id)->get();
           return response()->json($subcategory);
    }

   
 



}//end class
