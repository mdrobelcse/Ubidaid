  @extends('layouts.frontend.app')

@section('title')

   Ubidaid | orderdetails 

@endsection

@section('content')

 


    <!--===========================TRANSANCTION HISTORY START========================-->
    <div class="transanction-history">
         <div class="container-fluid">
              <div class="row">
                   <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                      <div class="history">

                        <div class="row">
                             <div class="transanction-history-title">
                                 <h3>Reservation details</h3>
                             </div>
                        </div>
                      
 

                        @if($allreservation->count() >0)

                        @foreach($allreservation as $reservation)

                           <div class="single-user">
                              <div class="row">
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        @php $x = 0 @endphp 
                                        @foreach($reservation->product->images as $image) 
                                        @if($x <= 0)

                                            <img src="{{ asset('public/uploads/product/'.$image->filename ) }}" height="70px" width="70px" alt="" />

                                         @endif  
                                         @php $x++ @endphp    
                                        @endforeach
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                       <h3>{{ $reservation->product->product_name }}</h3>
                                        
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">

                                        <h4 class="badge badge-success">Quantity: {{ $reservation->quantity }}</h4>
                                  
                                   </div>
                                   <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                      
                                   

                                      <h5>Price: ${{ 
                                                $total = $reservation->quantity*$reservation->product->price 
                                            }}</h5>

 
                                   </div>
                             </div>
                          </div>

                        @endforeach  

                        @endif  
                           
                        
 
 

                      </div>
                   </div>
              </div>
         </div>
    </div>
    <!--===========================TRANSANCTION HISTORY END========================-->

@endsection