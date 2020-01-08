<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;
use App\User;
use App\Category;
use App\Product;
use App\Subcategory;
use App\Servicetype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function findsubcategory($id)
    {

           $subcategory = Subcategory::where('category_id',$id)->get();
           return response()->json($subcategory);
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminLogin()
    {

        return view('admin.login');
    }

    public function pageByCategory()
    {
        return view('category');
    }

    public function searchableshop(Request $request)
    {

        return view('searchableshop');
    }

//    public function shop()
//    {
//        return view('shop');
//    }

    public function welcome()
    {
        $servicetypes = Servicetype::all();
        $blogs = Blog::latest()->take(3)->get();
        $posts = Post::where('status',2)->latest()->get();
        return view('welcome',compact('servicetypes','blogs','posts'));
    }


    public function categoryforserviceid($id)
    {
        $categories = Category::where('servicetype_id',$id)->get();
        return view('category',compact('categories'));
    }

    public function demo()
    {

        return view('demo');
    }


    public function shopbysubcategories($id)
    {

          $shops = Product::select('user_id')->where('subcategory_id',$id)->distinct()->get();
          return view('shopbysubcategories',compact('shops'));

    }


    public function singleshop($id)
    {

        $shop = User::where('id',$id)->first();



       if ($shop) {

                   $products = Product::latest()->where('user_id',$id)->get();

                    $categories = Category::all();


                    //select only this type of category which product only avalilable in this shop


                    $categoryforshop = Product::select('category_id')->where('user_id',$id)->distinct()->get();
                    
                   // return $products;

                    $posts = Post::where('user_id',$id)->limit(4)->get();
                    
                    if($shop->role_id == 2){
                       
                        return view('shop',compact('shop','products','categories','posts','categoryforshop'));

                    }elseif ($shop->role_id == 3) {

                        return view('service',compact('shop','products','categories','posts','categoryforshop'));
                    }

           
       }else{

           return view('404');
       }


    }

    
    public function productdetails($id)
    {
         $product = Product::findOrfail($id);
         return view('product_details',compact('product'));
    }




    public function RegisterformForBusinessaccount()
    {
        return view('user.businessregister');
    }
 



}//end class
