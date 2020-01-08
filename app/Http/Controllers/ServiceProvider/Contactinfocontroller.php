<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Shopinfo;
use Illuminate\Support\Facades\Auth;

class Contactinfocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopinfo = Shopinfo::where('user_id',Auth::id())->first();
        return view('service_provider.contactinfo.index',compact('shopinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
              
              'mobile' => 'required|unique:shopinfos,mobile',
              'salsehour' => 'required',
              'address' => 'required'
        ]);



        $shopinfo = new Shopinfo();
        $shopinfo->user_id = Auth::id();
        $shopinfo->mobile = $request->mobile;
        $shopinfo->time = $request->salsehour;
        $shopinfo->address = $request->address;
         $shopinfo->save();
        return redirect()->back()->with('successMsg','Contactinfo successfully updated:)');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function updateshopinfo(Request $request)
    {
      
       $this->validate($request,[

              // 'mobile' => 'required | unique:shopinfos,mobile,'.Auth::id(),
              'mobile' => 'required ',
              'salsehour' => 'required',
              'address' => 'required'
               
        ]);

       $duplicatenumber = Shopinfo::where('mobile',$request->mobile)->where('user_id','!=' , Auth::id());

       if ($duplicatenumber->count() > 0) {

           return redirect()->back()->with('errorMsg','the mobile number already exist:)');

       }else{


            $shopinfo = Shopinfo::where('user_id',Auth::id())->first();
            $shopinfo->user_id = Auth::id();
            $shopinfo->mobile = $request->mobile;
            $shopinfo->time = $request->salsehour;
            $shopinfo->address = $request->address;
            $shopinfo->save();
            return redirect()->back()->with('successMsg','Contactinfo successfully updated:)');

       }
    }
}//end class
