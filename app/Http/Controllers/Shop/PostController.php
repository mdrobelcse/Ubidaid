<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


use App\Post;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $posts = Post::where('user_id',Auth::id())->latest()->get();
        return view('shop_owner.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop_owner.post.create');
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
            'post_title' => 'required',
            'image' => 'required | mimes:jpeg,jpg,bmp,png',
            'post_details' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->post_title);

        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/post'))
            {
                mkdir('public/uploads/post',0777,true);
            }
            //$image->move('public/uploads/post',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/post');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(400, 300, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/
        } else {
            $imageName = "default.png";
        }

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_details = $request->post_details;
        $post->image = $imageName;
        $post->user_id = Auth::id();
        $post->slug = $slug;
        $post->save();
        //Toastr::success('Post Successfully Saved :)' ,'Success');
        //return redirect()->route('shop.post.index');
        return redirect()->route('shop.post.index')->with('successMsg','post succesfully saved :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('shop_owner.post.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        return view('shop_owner.post.edit',compact('post'));
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
            'post_title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'post_details' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->post_title);
        $post = Post::findOrfail($id);

        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/post'))
            {
                mkdir('public/uploads/post',0777,true);
            }
            unlink('public/uploads/post/'.$post->image);
            //$image->move('public/uploads/post',$imageName);
            //resize image***********************//


                     $destinationPath = public_path('uploads/post');

                     $resize_image = Image::make($image->getRealPath());

                     $resize_image->resize(400, 300, function($constraint){
                      $constraint->aspectRatio();
                     })->save($destinationPath . '/' . $imageName);

                    

        /*****************************/
        } else {
            $imageName = $post->image;
        }

        $post->post_title = $request->post_title;
        $post->post_details = $request->post_details;
        $post->image = $imageName;
        $post->user_id = Auth::id();
        $post->slug = $slug;
        $post->save();
        //Toastr::success('Post Successfully updated :)' ,'Success');
       // return redirect()->route('shop.post.index');
        return redirect()->route('shop.post.index')->with('successMsg','post succesfully updatred :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        if (file_exists('public/uploads/post/'.$post->image))
        {
            unlink('public/uploads/post/'.$post->image);
        }
        $post->delete();
        //Toastr::success('Post Successfully Deleted :)' ,'Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','product succesfully deleted :)');
    }

    //promote post method
     
     public function promote(Request $request, $id){

              $post = Post::findOrfail($id);
              $post->status = 1;
              $post->save();
             // Toastr::success('Request sent successfully for promote your post:)' ,'Success');
              //return redirect()->route('shop.post.index');
              return redirect()->route('shop.post.index')->with('successMsg','request sent successfully for promote your post:)');
     } 

}//end class
