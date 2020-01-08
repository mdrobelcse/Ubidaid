<?php

namespace App\Http\Controllers\Shop;

use App\PaymentName;
use App\Paymentnumber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_numbers = Paymentnumber::where('user_id',Auth::id())->get();
        return view('shop_owner.payment_method.index',compact('payment_numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment_names = PaymentName::all();
        return view('shop_owner.payment_method.create',compact('payment_names'));
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

            'number'=>'required | unique:paymentnumbers,number',
            'account_type'=>'required',
            'payment_type'=>'required',

        ]);


       $duplicate_payment_name =  $request->payment_type;

       $check_duplicate_oayment_name = Paymentnumber::where('payment_name',$duplicate_payment_name)->where('user_id',Auth::id())->get();


       if ($check_duplicate_oayment_name->count() > 0 ) {
           

           // Toastr::info('Payment method already exist:)' ,'Info');
           // return redirect()->back();
        return redirect()->back()->with('infoMsg','payment method already exist :)');

       }else{

            $payment_number = new Paymentnumber();
            $payment_number->number = $request->number;
            $payment_number->account_type = $request->account_type;
            $payment_number->payment_name = $request->payment_type;
            $payment_number->description = $request->description;
            $payment_number->user_id = Auth::id();
            $payment_number->save();
            //Toastr::success('Payment method Successfully Saved:)' ,'Success');
            //return redirect()->route('shop.paymentmethod.index');
        return redirect()->route('shop.paymentmethod.index')->with('successMsg','payment method successfully saved:)');

       }


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
        $payment_names = PaymentName::all();
        $payment_number = Paymentnumber::findOrfail($id);
        return view('shop_owner.payment_method.edit',compact('payment_names','payment_number'));
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

            'number'=>'required | unique:paymentnumbers,number,'.$id,
            'account_type'=>'required',
            'payment_type'=>'required',

        ]);

            $duplicate_payment_name =  $request->payment_type;

            $payment_number = Paymentnumber::find($id);

            if($payment_number->payment_name == $duplicate_payment_name){

                    $payment_number->number = $request->number;
                    $payment_number->account_type = $request->account_type;
                    $payment_number->payment_name = $request->payment_type;
                    $payment_number->description = $request->description;
                    $payment_number->user_id = Auth::id();
                    $payment_number->save();
                    //Toastr::success('Payment method Successfully Updated:)' ,'Success');
                    //return redirect()->route('shop.paymentmethod.index');
                    return redirect()->route('shop.paymentmethod.index')->with('successMsg','payment method successfully updated:)');
            }else{

                 //Toastr::info('Payment method already exist:)' ,'Info');
                 //return redirect()->back();
                return redirect()->back()->with('infoMsg','payment method already exist :)');

            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_number = Paymentnumber::find($id);
        $payment_number->delete();
        Toastr::success('Payment method Successfully Deleted:)' ,'Success');
        return redirect()->back();
    }
}
