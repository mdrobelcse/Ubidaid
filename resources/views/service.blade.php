 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | Service 

@endsection

@section('content')


 <!--======================SHOP INFORMATION SECTION START=================-->
@if($shop->profile == 'default.png')
  

   <div class="shop-details" style="background-image: url({{ asset('public/uploads/shopbanner/default/default.jpg') }});">

@else

 <div class="shop-details" style="background-image: url({{ asset('public/uploads/shopbanner/'.$shop->profile) }});">

@endif 
          <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                       <div class="shop-info">
                           <h2>{{ $shop->name }} (ID:{{ $shop->id }})</h2>
                           <h3>Location: {{ $shop->address }}</h3>
                           <h3>Owner: {{ $shop->owner_name }}</h3>
                            <div class="contact-info">

                            @php
                                
                                 $fav =   App\Favourite::checkexistingfavlist(Auth::id(),$shop->id);

                            @endphp

                               <div class="favicon">
                                    <a href="{{ route('user.addto.favourite',$shop->id) }}" onclick="event.preventDefault();
                                       document.getElementById('addto-favourite').submit();"><i class="material-icons" id="{{ $fav ? 'faviconcolor':'' }}">favorite</i></a> 
                                       <p>+Favourite</p>
                               </div>

                                <form id="addto-favourite" action="{{ route('user.addto.favourite',$shop->id) }}" method="POST" style="display: none;">
                                        @csrf
                                </form>

                              <div class="messageicon">
                                <a href="{{ route('contact.index',$shop->id) }}"><i class="material-icons">message</i></a> 
                                <p>Message</p>
                              </div>
                                
                           </div>
                       </div>
                 </div>
             </div>
         </div>
   </div>
   <!--======================SHOP INFORMATION SECTION START END=================-->

  
   <!--======================BANNER SECTION START=====================-->

@if($shop->image == 'default.png')

<div class='section header' style="margin-top: 5%;">
  <div class='photo'>
    <img src='{{ asset('public/uploads/discountbanner/default/default.jpg') }}'
         srcset='{{ asset('public/uploads/discountbanner/default/default.jpg') }} 2000w,
                 {{ asset('public/uploads/discountbanner/default/default.jpg') }} 1000w'
         sizes='(min-width: 960px) 960px,
                100vw'/>
  </div>
</div>

@else

<div class='section header' style="margin-top: 5%;">
  <div class='photo'>
    <img src='{{ asset('public/uploads/discountbanner/'.$shop->image) }}'
         srcset='{{ asset('public/uploads/discountbanner/'.$shop->image) }} 2000w,
                 {{ asset('public/uploads/discountbanner/'.$shop->image) }} 1000w'
         sizes='(min-width: 960px) 960px,
                100vw'/>
  </div>
</div>

@endif

<!--======================BANNER SECTION END=====================-->


   <!--========================REVIEW SECTION START=======================-->
   <div class="review-section">
       <div class="container-fluid">
            <div class="row">
              <div class="review-heading">
                   <h3>Review</h3>
              </div>
                 <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                     <div class="row">
                           <div class="col-md-12 col-lg-12">
                              <div class="row">

                          @if($posts->count() > 0)
                          

                            @php $x = 1 @endphp
                            @foreach($posts as $post)
                               
                                  

                                @if($x == 4)

                                   <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                         <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                              <div class="see-more-timeline">
                                                   <img class="img-responsive" src="{{ asset('public/uploads/post/'.$post->image) }}" alt="">
                                                   <div class="see-more-link">
                                                       <a href="{{ route('seemore.post',$shop->id,'this is details link') }}"><span>+</span>See More <br> on our timeline</a>
                                                   </div>
                                              </div>
                                            </div>
                                          </div>
                                   </div>

                                @else


                                 <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                        <div class="single-review">
                                             <img class="img-responsive" src="{{ asset('public/uploads/post/'.$post->image) }}" alt="">
                                             <div class="review-body">
                                                 <h4>{{ $post->post_title }}</h4>
                                                  <!-- <P>Architecture,House</P> -->
                                             </div>
                                        </div>
                                   </div>
                                


                                @endif

                            @php $x++ @endphp       

                            @endforeach

                          @else
                  
                              <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-review">
                                         <div class="review-body">
                                             <h4>Post not available</h4>
                                         </div>
                                    </div>
                              </div>

                          @endif  
                                  
                              </div>
                           </div>
                         <!--   <div class="col-lg-3 col-md-3">
                               <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="see-more-timeline">
                                             <img class="img-responsive" src="{{asset('public/frontend/images/see-more.jpg')}}" alt="">
                                             <div class="see-more-link">
                                                 <a href="{{ route('seemore.post',$shop->id,'this is details link') }}"><span>+</span>See More <br> on our timeline</a>
                                             </div>
                                        </div>
                                    </div>
                              </div>
                           </div> -->
                     </div>
                 </div>
            </div>
       </div>
   </div>
   <!--========================REVIEW SECTION END=======================-->


   <!--========================BOOKING SECTION START=========================-->
   <div class="booking-section">
       <div class="container-fluid">
            <div class="row">
              <div class="booking-heading">
                  <h3>Services</h3>
              </div>
                 <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                     <div class="row">

                      @foreach($products as $product)

                          <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="booking">

                                @php $x=0 @endphp
                                @foreach($product->images as $image)
                                    @if($x<=0)
                                       <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                                    @endif
                                 @php $x++ @endphp
                                 @endforeach 

                                     <div class="booking-body">
                                           <h4>{{ $product->product_name }}</h4>
                                           
                                           
                                     </div>
                                     <div class="booking-link">
                                               <a href="{{ route('product_details',$product->id) }}">Book Now</a>
                                      </div>
                                </div>
                          </div>

                      @endforeach    

                          
                     </div>
                 </div>
            </div>
       </div>
   </div>
   <!--========================BOOKING SECTION END=========================-->



@endsection