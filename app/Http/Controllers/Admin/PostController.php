<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;


use App\Post;

class PostController extends Controller
{
    
    public function index()
    {

    	 $posts = Post::where('status',1)->Orwhere('status',2)->latest()->get();
    	 return view('admin.post.index',compact('posts'));

    }

    public function viewpost($id)
    {
       
        $post = Post::findOrfail($id);
        return view('admin.post.view',compact('post'));

    }

    public function promote(Request $request, $id)
    {

    	$post = Post::findOrfail($id);
    	$post->status = 2;
    	$post->save();
    	//Toastr::success('Post Successfully Promoted :)' ,'Success');
        //return redirect()->route('admin.post.index');
        return redirect()->route('admin.post.index')->with('successMsg','post succesfully promoted :)');
    }

    public function viewpostforcancenpromote($id)
    {
       
        $post = Post::findOrfail($id);
        return view('admin.post.viewforcancel',compact('post'));

    }

    public function removepromotion(Request $request, $id)
    {
    

    	$post = Post::findOrfail($id);
    	$post->status = 0;
    	$post->save();
    	//Toastr::success('Post Successfully remove from promotion list :)' ,'Success');
        //return redirect()->route('admin.post.index');
        return redirect()->route('admin.post.index')->with('successMsg','post successfully remove from promotion list :) :)');
       
    }

}//end class
