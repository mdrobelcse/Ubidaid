<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::latest()->get();
        return view('admin.blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required',
            'image' => 'required | mimes:jpeg,jpg,bmp,png',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/blog'))
            {
                mkdir('public/uploads/blog',0777,true);
            }
            //$image->move('public/uploads/blog',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/blog');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(400, 300, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/
        } else {
            $imageName = "default.png";
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $imageName;
        $blog->save();
        //Toastr::success('Post Successfully Saved :)' ,'Success');
        //return redirect()->route('admin.blog.index');
        return redirect()->route('admin.blog.index')->with('successMsg','post succesfully saved :)');
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
        $post = Blog::findOrfail($id);
        return view('admin.blog.edit',compact('post'));
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
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $blog = Blog::findOrfail($id);

        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/blog'))
            {
                mkdir('public/uploads/blog',0777,true);
            }
            unlink('public/uploads/blog/'.$blog->image);
            //$image->move('public/uploads/blog',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/blog');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(400,300, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                      
                    

        /*****************************/
        } else {
            $imageName = $blog->image;
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $imageName;
        $blog->save();
       // Toastr::success('Post Successfully updated :)' ,'Success');
       // return redirect()->route('admin.blog.index');
         return redirect()->route('admin.blog.index')->with('successMsg','post succesfully updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::findOrfail($id);
        if (file_exists('public/uploads/blog/'.$post->image))
        {
            unlink('public/uploads/blog/'.$post->image);
        }
        $post->delete();
        //Toastr::success('Post Successfully Deleted :)' ,'Success');
        //return redirect()->back();
         return redirect()->back()->with('successMsg','post succesfully deleted :)');
    }
}
