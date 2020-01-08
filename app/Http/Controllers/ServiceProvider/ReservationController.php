<?php

namespace App\Http\Controllers\ServiceProvider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reservation;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $allreserves = Reservation::where('shop_id',Auth::id())->latest()->get();
        return view('service_provider.reserve.index',compact('allreserves'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $reserve = Reservation::findOrfail($id);
        return view('service_provider.reserve.view',compact('reserve'));
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
        // echo $id;
        $reservation = Reservation::findOrfail($id);
        $reservation->delete();
        //Toastr::success('Reservation Successfully Deleted:)' ,'Success');
        //return redirect()->back();
        return redirect()->back()->with('successMsg','reservation succesfully deleted :)');
    }
     
     public function confirmReserve($id)
     {
        // echo $id;
        $reservation = Reservation::findOrfail($id);
        $reservation->order_status = 1;
        $user_id = $reservation->user_id;
        $reservation->save();



         //send notification to user
         
         $notification = new Notification();
         $notification->user_id = $user_id; 
         $notification->notification = 'author accepted your reservation request...'.'reservation id is:#9901'.$id;   
         $notification->save();




        //Toastr::success('Reservation confirm Successfully:)' ,'Success');
        //return redirect()->back();
         return redirect()->back()->with('successMsg','reservation confirm succesfully :)');
     }

     public function completeReserve($id)
     {

         // echo $id;
        $reservation = Reservation::findOrfail($id);
        $reservation->order_status = 2;
        $user_id = $reservation->user_id;
        $reservation->save();



         //send notification to user
         
     $notification = new Notification();
     $notification->user_id = $user_id; 
     $notification->notification = 'succesfully complete your reservation...'.'reservation id is:#9901'.$id;   
     $notification->save();


        //Toastr::success('Reservation completed Successfully:)' ,'Success');
        //return redirect()->back();
          return redirect()->back()->with('successMsg','reservation complete succesfully :)');
     }

 


}//end class
