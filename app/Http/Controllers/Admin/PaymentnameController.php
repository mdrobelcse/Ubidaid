<?php

namespace App\Http\Controllers\Admin;

use App\PaymentName;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentName::all();
        return view('admin.payment_method.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.create');
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

            'name'=>'required | unique:payment_names,name'
        ]);


        $paymentname = new PaymentName();
        $paymentname->name = $request->name;
        $paymentname->slug = str_slug($request->name);
        $paymentname->save();
        //Toastr::success('Payment Method Successfully Saved :)' ,'Success');
       // return redirect()->route('admin.paymentname.index');
        return redirect()->route('admin.paymentname.index')->with('successMsg','payment method successfully saved :)');
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

        $payment = PaymentName::findOrfail($id);
        return view('admin.payment_method.edit',compact('payment'));
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

            'name'=>'required | unique:payment_names,name,'.$id,
        ]);


        $paymentname = PaymentName::findOrfail($id);
        $paymentname->name = $request->name;
        $paymentname->slug = str_slug($request->name);
        $paymentname->save();
        //Toastr::success('Payment Method Successfully Updated :)' ,'Success');
        //return redirect()->route('admin.paymentname.index');
        return redirect()->route('admin.paymentname.index')->with('successMsg','payment method successfully updated:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentname = PaymentName::findOrfail($id);
        $paymentname->delete();
        //Toastr::success('Payment Method Successfully Deleted :)' ,'Success');
        //return redirect()->back();
         return redirect()->back()->with('successMsg','payment method successfully deleted:)');
    }
}
