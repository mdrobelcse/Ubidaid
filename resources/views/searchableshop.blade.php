@extends('layouts.frontend.app')
 
@section('title')

   Ubidaid | shop 

@endsection

@section('content')


      <!--=============================SEARCH SECTION START==============================-->
   <div class="search-section">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                     <div class="row">
                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                             <div class="search-bar">
                                 <div class="showing-by">
                                     <h4>Showing By:</h4>
                                 </div>
                                 <div class="search-item">
                                     <ul>
                                       <li><a href="">Nearby</a></li>
                                       <li><a href="">Rating</a></li>
                                       <li><a href="">Top</a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>

 
            @if($shops->count() > 0)

                @foreach($shops as $shop)            
                        <div class="row">
                            <div class="search-result">
                              <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                      <div class="search-left">

                                        @if($shop->user->image == 'default.png') 

                                          <a href="{{ route('single-shop',$shop->user_id) }}"><img class="img-responsive" src="{{ asset('public/uploads/discountbanner/default/default.jpg') }}" alt=""></a>
                                        @else

                                            <a href="{{ route('single-shop',$shop->user_id) }}"><img class="img-responsive" src="{{ asset('public/uploads/discountbanner/'.$shop->user->image) }}" alt=""></a>

                                        @endif

                                          <div class="featured">
                                              <h3>Featured</h3>
                                          </div>
                                      </div>
                               </div>
                               <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                     <div class="search-right">
                                        <img class="img-responsive" src="{{asset('public/frontend/images/search-right.jpg')}}" alt="">
                                            <div class="search-shop-details">
                                                  <h4>Fast-shop (ID:{{ $shop->user_id }})</h4>
                                                  <h5>Location: {{ $shop->user->address }}</h5>
                                                  <h5>Owner: {{ $shop->user->name }}</h5>
                                            </div>
                                      </div>
                               </div>
                           </div>
                       </div>

                @endforeach

            @else    


                <div class="row">
                    <div class="search-result">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                                <div class="search-left">
                                    <h3 style="text-align: center;color: red;font-size: 20px;font-family: auto;">Shop not available</h3>
                                </div>
                         </div>   
                     </div>
                 </div>


            @endif

                


                         

                 </div>
            </div>
        </div>
   </div>
   <!--=============================SEARCH SECTION END=================================-->



@endsection
