<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*route for upload resizeable image*/

Route::get('resize','ProductphotoController@index')->name('image.resize');
Route::post('resize/resize_image','ProductphotoController@store')->name('image.store');

/*route for upload resizeable image*/


/*****************************************/
Route::get('finddsubcategory/{id}','HomeController@findsubcategory')->name('findsubcat');

/******************************************/

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/demo', 'HomeController@demo')->name('demo');


Route::get('pagebycategory', 'Homecontroller@pageByCategory')->name('pagebycategory');


Route::get('categoryforserviceid/{id}', 'Homecontroller@categoryforserviceid')->name('categoryforserviceid');


Route::post('/searchableshop', 'HomeController@searchableshop')->name('searchableshop');

Route::get('allblogs/postcontroller','PostController@alldminpost')->name('alladmin.post');





Route::get('/shopbysubcategories/{id}','HomeController@shopbysubcategories')->name('shopbysubcategories');

Route::get('/single-shop/{id}','HomeController@singleshop')->name('single-shop');


Route::get('/product_details/{id}','HomeController@productdetails')->name('product_details');



Route::get('shopbyid/{id}','ShopController@shopbyid')->name('shopbyid');




Route::get('productbysubcat/{id}','ShopController@productbysubcat')->name('productbysubcat');



Route::resource('post','PostController');


Route::get('seemore/post/{id}','PostController@seeMorePost')->name('seemore.post');
Route::get('details/post/{id}','PostController@postDetails')->name('post.details');



//contact route

Route::get('contact/user/contactcontroller/contactus/{id}','ContactController@index')->name('contact.index');

Route::post('send/contact/message/contactcontroller/sendmessage','ContactController@sendMessage')->name('send.contact.message');




Route::get('business/account/register','Homecontroller@RegisterformForBusinessaccount')->name('business.register');


//route for suggested search

Route::post('/autocomplete/searchbox', 'ProductController@fetchdata')->name('autocomplete.searchbox');

Route::post('/search/byproduct', 'ProductController@searchproduct')->name('searchby.product');



//password reset route for user

Route::get('password/reset','User\ForgotpasswordController@showlinkrequestform')->name('user.password.request');
Route::post('password/email', 'User\ForgotpasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('password/rest/{id}', 'User\ForgotpasswordController@showResetForm')->name('user.password.reset');
Route::put('password/update', 'User\ForgotpasswordController@reset')->name('user.password.update');


//Route::get('/servicetype','ServicetypeController@serviceType')->name('servicetype');




/*
 * admin route
 *
 * */

Route::group(["as"=>"admin.","prefix"=>"admin","namespace"=>"Admin","middleware"=>["admin"]],function(){

      Route::get("/dashboard","DashboardController@index")->name("dashboard");
      Route::resource("category","CategoryController");
      Route::resource("service","ServiceController");
      Route::resource("paymentname","PaymentnameController");
      Route::resource("subcategory","SubcategoryController");
      Route::resource("blog","BlogController");

     Route::get('profile','ProfileController@profile')->name('profile');
     Route::put('profile/update','ProfileController@profileUpdate')->name('profile.update');


    //promote post

     Route::get('allpostfor/promoted','PostController@index')->name('post.index');
     Route::get('view/post/{id}','PostController@viewpost')->name('view.post');
     Route::get('view/post/forcancel/promote/{id}','PostController@viewpostforcancenpromote')->name('viewforcancel.promote');
     Route::put('promote/post/{id}','PostController@promote')->name('post.promote');

     Route::put('promote/cancel/post/{id}','PostController@removepromotion')->name('post.promote.cancel');

    //change pasword route

    Route::get('changepassword','ChangepasswordController@index')->name('changepassword.index');
    Route::put('updatepassword','ChangepasswordController@updatepassword')->name('update.password');



});

Route::get('admin/login', 'HomeController@adminLogin')->name('admin.login');



/*
 * shop owner route
 *
 * */

Route::group(["as"=>"shop.","prefix"=>"shop","namespace"=>"Shop","middleware"=>["auth","shop"]],function(){

    Route::get("/dashboard","DashboardController@index")->name("dashboard");
    Route::resource("product","ProductController");
    Route::resource("paymentmethod","PaymentmethodController");
    Route::get("order","OrderController@index")->name('order.index');
    Route::get("order/{id}","OrderController@view")->name('order.view');
    Route::put("order.confirm/{id}","OrderController@orderconfirm")->name('order.confirm');
    Route::put("order.complete/{id}","OrderController@ordercomplete")->name('order.complete');
    Route::delete("order/destroy/{id}","OrderController@orderdestroy")->name('order.destroy');
    Route::resource("discount","DiscountbannerController");
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::put('profile/update','ProfileController@profileUpdate')->name('profile.update');


    //promoted post

    Route::resource("post","PostController");
    Route::put("post/promote/{id}","PostController@promote")->name('post.promote');


    //contact route

    Route::get('contact/index','ContactController@index')->name('contact.index');
    Route::get('contact/view/{id}','ContactController@view')->name('contact.view');
    Route::delete('contact/destroy/{id}','ContactController@destroy')->name('contact.destroy');


    //subcategory found by category id


    Route::get('finddsubcategory/{id}','ProductController@findsubcategory')->name('findsubcat');


   //route for update shipping cost and text

    Route::get('shippingcostandtext/shop/shippingcostcontroller','ShippingcostController@index')->name('shippingcost.index');

     Route::put('update/shippingcostandtext/shop/shippingcostcontroller','ShippingcostController@update')->name('shippingcost.update');


     //update contact information route

     Route::resource('shopinfo','ContactinfoController');
     Route::put('shopinfo','ContactinfoController@updateshopinfo')->name('update.shopinfo');


    //change pasword route

    Route::get('changepassword','ChangepasswordController@index')->name('changepassword.index');
    Route::put('updatepassword','ChangepasswordController@updatepassword')->name('update.password');





});




/*
 * service provider route
 *
 * */

Route::group(["as"=>"service_provider.","prefix"=>"service_provider","namespace"=>"ServiceProvider","middleware"=>["auth","serviceprovider"]],function(){

     Route::get("/dashboard","DashboardController@index")->name("dashboard");

     Route::resource("service","ServiceController");

     Route::resource("paymentmethod","PaymentmethodController");

     Route::resource("discount","DiscountbannerController");


     //reservation route

      Route::resource("reservation","ReservationController");
      Route::put("reservation/confirm/{id}","ReservationController@confirmReserve")->name('reservation.confirm');
      Route::put("reservation/complete/{id}","ReservationController@completeReserve")->name('reservation.complete');


     //profile route


     Route::get('profile','ProfileController@profile')->name('profile');
     Route::put('profile/update','ProfileController@profileUpdate')->name('profile.update');



     //promoted post

     Route::resource("post","PostController");
     Route::put("post/promote/{id}","PostController@promote")->name('post.promote');


      //contact route

    Route::get('contact/index','ContactController@index')->name('contact.index');
    Route::get('contact/view/{id}','ContactController@view')->name('contact.view');
    Route::delete('contact/destroy/{id}','ContactController@destroy')->name('contact.destroy');



    //update contact information route

     Route::resource('shopinfo','ContactinfoController');

     Route::put('shopinfo','ContactinfoController@updateshopinfo')->name('update.shopinfo');

     //change pasword route

    Route::get('changepassword','ChangepasswordController@index')->name('changepassword.index');
    Route::put('updatepassword','ChangepasswordController@updatepassword')->name('update.password');



});



/*
 * user route
 *
 * */

Route::group(["as"=>"user.","prefix"=>"user","namespace"=>"User","middleware"=>["auth","user"]],function(){

    Route::get("/dashboard","DashboardController@index")->name("dashboard");
    Route::post('addtocart','CartController@addtocart')->name('addtocart');
    Route::get('checkout/{id}','OrderController@checkout')->name('checkout');
    Route::get('findnumber/{id}','OrderController@findnumber')->name('findnumber');
    Route::post('order','OrderController@order')->name('order');
    Route::get('cart/item','CartController@allcartitem')->name('cartitem');
    // Route::get('productbysubcat/{id}','ShopController@productbysubcat')->name('productbysubcat');
    Route::get('success/message','OrderController@successmessage')->name('successmsg');
    Route::get('removeproduct/{id}','CartController@removeProduct')->name('removeProduct');
    Route::post('updatequantity/{id}','CartController@updateQuantity')->name('updateQuantity');
    Route::get('productbycategory/{id}','ProductController@productbyCat')->name('productbycat');

    Route::get('demo_checkout/{id}','OrderController@demo_checkout')->name('democheckout');


    //reservation route

    Route::get('reservation/reservationcontroller/showreservationform/{id}','ReservationController@index')->name('reserve.form');
    Route::post('reservation/reservationcontroller/reserveservice','ReservationController@reservation')->name('reservation.confirm');


    //favourite route

    Route::post('addto/favouritelist/user/favouritecontroller/{id}','FavouriteController@addtofavourite')->name('addto.favourite');


    Route::get('allfavouritesho/user/shopcontroller','ShopController@allfavouriteshop')->name('allfavouriteshop');


   //notification route

    Route::get('allnotification/user/notificationcontroller/{id}','Notificationcontroller@index')->name('allnotification');



   //user profile update

    Route::get('edit/userprofile/user/profilecontroller','ProfileController@index')->name('profile.edit');
    Route::put('userprofile/profile/update','ProfileController@profileUpdate')->name('profile.update');


    //view all order


    Route::get('view/allorder/user/profilecontroller/{id}','ProfileController@vieworder')->name('view.allorder');

     Route::get('view/allreservatoin/user/profilecontroller/{id}','ProfileController@viewreservation')->name('view.allreserve');


    //change pasword route

    Route::get('changepassword','ChangepasswordController@index')->name('changepassword.index');
    Route::put('updatepassword','ChangepasswordController@updatepassword')->name('update.password');



});






/*search functionlity*/

Route::get('searchcountry','SearchCountry@index')->name('searchcountry.index');
Route::post('/searchcountryresult','SearchCountry@searchcountryresult')->name('searchcountry.result');



Route::get('searchtwo', 'AutoCompleteController@index');
Route::post('/autocomplete/fetch', 'AutoCompleteController@fetch')->name('autocomplete.fetch');


/******************************************************************/


Route::get('search', 'AutoCompleteController@search');
Route::post('/autocomplete/search', 'AutoCompleteController@fetchdata')->name('autocomplete.fetchdata');
