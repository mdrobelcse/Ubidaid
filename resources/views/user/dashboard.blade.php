@extends('layouts.frontend.app')

@section('title')

   Ubidaid | Profile 

@endsection

@section('content')

 

   <!--======================SHOP INFORMATION SECTION START=================-->
  <!--  <div class="shop-details" style="background-image: url({{ asset('public/uploads/shopbanner/default/default.jpg') }});"> -->
     
   <!--======================SHOP INFORMATION SECTION START END=================-->

    <div class="shop-details">

          <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                       <div class="shop-info">
                           <h2>Name:{{ Auth::user()->name }}</h2>
                           <h3>Location: {{ Auth::user()->address }}</h3>
                           
                           <div class="profile-info">

                              <div class="messageicon">
                                <a href="{{ route('user.allnotification',Auth::id()) }}"><i class="material-icons">notifications</i></a> 
                              </div>
                              <div class="messageicon">
                                <a href="{{ route('user.profile.edit') }}"><i class="material-icons">create</i></a> 
                              </div>
                                
                           </div>
                       </div>
                 </div>
             </div>
         </div>
   </div>

    
    <!--===========================TRANSANCTION HISTORY START========================-->
    <div class="transanction-history">
         <div class="container-fluid">
              <div class="row">
                   <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                      <div class="history">

                        <div class="row">
                             <div class="transanction-history-title">
                                 <h3>Transanction History</h3>
                             </div>
                        </div>
                      
                      @if($allorderbyuserid->count() >0 || $allreservationbyuserid->count() > 0)

                        @foreach($allorderbyuserid as $allorder)

                           <div class="single-user">
                              <div class="row">
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                      
                                      @if(Auth::user()->role_id == 4 && Auth::user()->profile == 'default.png' )

                                         <img class="img-responsive" src="{{ asset('public/uploads/profile/default/default.jpg') }}" alt="user">

                                      @else

                                        <img class="img-responsive" src="{{ asset('public/uploads/profile/'.$allorder->user->profile) }}" alt="user">

                                          

                                      @endif

                                      



                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                       <h3>{{ $allorder->name }}</h3>
                                       <p>{{ $allorder->created_at }}</p>
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">

                                    @if($allorder->order_status == 0)

                                          <h4 class="badge badge-info">Pending order</h4>

                                    @elseif($allorder->order_status == 1)

                                         <h4 class="badge badge-success">Order in progress</h4>

                                    @elseif($allorder->order_status == 2)

                                        <h4 class="badge badge-success">Order completed</h4>

                                    @endif

                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                      
                                  @php

                                     $allorderid =   App\Cart::allproductsbyorderid($allorder->id);
                                     $shippingcostandtex = App\User::texandshippingcost($allorder->shop_id);
                                     $tex = $shippingcostandtex->text;
                                     $shippingcost = $shippingcostandtex->shipping_cost;
                                     $total_price = 0;

                                  @endphp


                                      @foreach($allorderid as $orderid)

                                         @php

                                          $total_price+=$orderid->product->price*$orderid->product_quantity

                                         @endphp  

                                      @endforeach 

                                      @php 


                                        if($tex==0){

                                            $text = $total_price*1/100;

                                        }else{


                                              $text = $total_price*$tex/100; 

                                          }




                                          if($shippingcost == 0){

                                             $shippingcost = 5;
                                          }

                                          

                                      @endphp

                                      <h5>$ {{ $text+$total_price+$shippingcost  }}</h5>


                                      <span class="btn btn-info"><a href="{{ route('user.view.allorder',$allorder->id) }}">view order</a></span>

 
                                   </div>
                             </div>
                          </div>
                           
                        @endforeach

                        @foreach($allreservationbyuserid as $allreserve)

                           <div class="single-user">
                              <div class="row">
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                      @if(Auth::user()->role_id == 4 && Auth::user()->profile == 'default.png' )

                                         <img class="img-responsive" src="{{ asset('public/uploads/profile/default/default.jpg') }}" alt="user">

                                      @else

                                        <img class="img-responsive" src="{{ asset('public/uploads/profile/'.$allreserve->user->profile) }}" alt="user">

                                          

                                      @endif
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                       <h3>{{ $allreserve->name }} </h3>
                                       <p>{{ $allreserve->created_at }}</p>
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">

                                    @if($allreserve->order_status == 0)

                                          <h4 class="badge badge-info">Pending order</h4>

                                    @elseif($allreserve->order_status == 1)

                                         <h4 class="badge badge-success">Order in progress</h4>

                                    @elseif($allreserve->order_status == 2)

                                        <h4 class="badge badge-success">Order completed</h4>

                                    @endif

                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">


                                      <h5>$ {{ $allreserve->quantity*$allreserve->product->price  }}</h5>

                                      <span class="btn btn-info"><a href="{{ route('user.view.allreserve',$allreserve->id) }}">view order</a></span>
                                   </div>
                             </div>
                          </div>
                           
                        @endforeach


                      @else

                      <div class="single-user">
                              <div class="row">
                                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <h4 style="color: #333;text-align: center;">You have no any transanction yet</h4>
                                   </div>
                             </div>
                      </div>


                      @endif  

                      </div>
                   </div>
              </div>
         </div>
    </div>
    <!--===========================TRANSANCTION HISTORY END========================-->

@endsection