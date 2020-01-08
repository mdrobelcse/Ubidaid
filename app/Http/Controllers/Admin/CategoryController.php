<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Servicetype;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicetypes = Servicetype::all();
        return view('admin.category.create',compact('servicetypes'));
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
            'name' => 'required | unique:categories,name',
            'category_img' => 'required | mimes:jpeg,jpg,bmp,png',
            'typeofservice' => 'required',
        ]);

        $category_img = $request->file('category_img');
        $slug = str_slug($request->name);

        if(isset($category_img))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$category_img->getClientOriginalExtension();
            if (!file_exists('public/uploads/category'))
            {
                mkdir('public/uploads/category',0777,true);
            }
            //$category_img->move('public/uploads/category',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/category');

                     $resize_image = Image::make($category_img->getRealPath());

                     $resize_image->resize(250, 250, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/
        } else {
            $imageName = "default.png";
        }

        $category = new Category();
        $category->name = $request->name;
        $category->category_img = $imageName;
        $category->servicetype_id = $request->typeofservice;
        $category->slug = $slug;
        $category->save();
        //Toastr::success('Category Successfully Saved :)' ,'Success');
        //return redirect()->route('admin.category.index');
        return redirect()->route('admin.category.index')->with('successMsg','category succesfully saved :)');
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
        $category = Category::findOrfail($id);
        $servicetypes = Servicetype::all();
        return view('admin.category.edit',compact('category','servicetypes'));
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
            'name' => 'required | unique:categories,name,'.$id,
            'category_img' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $category_img = $request->file('category_img');
        $slug = str_slug($request->name);
        $category = Category::findOrfail($id);

        if(isset($category_img))
        {
            // make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$category_img->getClientOriginalExtension();
            if (!file_exists('public/uploads/category'))
            {
                mkdir('public/uploads/category',0777,true);
            }
            unlink('public/uploads/category/'.$category->category_img);
            //$category_img->move('public/uploads/category',$imageName);
             //resize image***********************//


                     $destinationPath = public_path('uploads/category');

                     $resize_image = Image::make($category_img->getRealPath());

                     $resize_image->resize(250, 250, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/


        } else {
            $imageName = $category->category_img;
        }

        $category->name = $request->name;
        $category->category_img = $imageName;
        $category->servicetype_id = $request->typeofservice;
        $category->slug = str_slug($category->name);
        $category->save();
       // Toastr::success('Category Successfully Updated :)' ,'Success');
       // return redirect()->route('admin.category.index');
        return redirect()->route('admin.category.index')->with('successMsg','category succesfully updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::findOrfail($id);
        if (file_exists('public/uploads/category/'.$category->category_img))
        {
            unlink('public/uploads/category/'.$category->category_img);
        }
        $category->delete();
        //Toastr::success('Category Successfully Deleted :)' ,'Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','category succesfully deleted :)');

    }
}
