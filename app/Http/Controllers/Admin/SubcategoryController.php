<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        return view('admin.sub_category.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_category.create',compact('categories'));
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

            'name'=>'required | unique:subcategories,name',
            'category'=>'required',

        ]);


        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();
        //Toastr::success('Sub-category Successfully Saved :)' ,'Success');
        //return redirect()->route('admin.subcategory.index');
        return redirect()->route('admin.subcategory.index')->with('successMsg','sub-category successfully saved :)');
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
        $categories = Category::all();
        $subcat = Subcategory::find($id);
        return view('admin.sub_category.edit',compact('categories','subcat'));
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

            'name'=>'required | unique:subcategories,name,'.$id,
            'category'=>'required',

        ]);


        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();
       // Toastr::success('Sub-category Successfully Updated :)' ,'Success');
       // return redirect()->route('admin.subcategory.index');

         return redirect()->route('admin.subcategory.index')->with('successMsg','sub-category successfully updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        //Toastr::success('Sub-category Successfully Deleted :)' ,'Success');
        //return redirect()->back();
         return redirect()->route('admin.subcategory.index')->with('successMsg','sub-category successfully deleted :)');
    }
}
