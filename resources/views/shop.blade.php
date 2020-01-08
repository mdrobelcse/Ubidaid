 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | Shop 

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


   <!--======================OFFER AND NEW ARRIVAL SECTION START===============-->
   <div class="offer-section">
       <div class="container-fluid">
            <div class="row">
              <div class="offser-heading">
                  <h3>Offer & New Arrival</h3>
              </div>
                 <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                     <div class="row">


                        @foreach($products as $product)

                           <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" style="padding: 2px">
                                <div class="single-product">



                                @php $x=0 @endphp
                                @foreach($product->images as $image)
                                    @if($x<=0)
                                       <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                                    @endif
                                 @php $x++ @endphp
                                 @endforeach 
                                      

                                      <h5>{{ $product->product_name }}</h5>
                                      <p>৳ {{ $product->price }}</p>

                                      <div class="rating">
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <span>(5)</span>
                                      </div>
                                      <div class="single-pro-btn">
                                         <a href="{{ route('product_details',$product->id) }}">view details</a>
                                      </div>
                                </div>
                          </div>
                        
                        @endforeach 


                     </div>
                 </div>
            </div>
       </div>
   </div>
   <!--======================OFFER AND NEW ARRIVAL SECTION END===============-->




   <!--==================================CATEGORY SECTION START=======================-->

 @foreach($categoryforshop as $cat)

   <div class="collection-section">
       <div class="container-fluid">
            <div class="row">
                 <div class="collection-heading">
                     <h3>{{ $cat->category->name }}</h3>
                 </div>
                 <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                     <div class="row">

                        @php

                           $allproductforcat =   App\Category::allproductforcat($cat->category_id, $shop->id);
                           
                        @endphp

                        @foreach($allproductforcat as $product)

                           <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" style="padding: 2px">
                                <div class="single-product">


                                 @php $x=0 @endphp
                                 @foreach($product->images as $image)
                                    @if($x<=0)
                                       <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                                    @endif
                                 @php $x++ @endphp
                                 @endforeach

 

                                      <h5>{{ $product->product_name }}</h5>
                                      <p>৳ {{ $product->price }}</p>
                                      <div class="rating">
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <span>(5)</span>
                                      </div>
                                      <div class="single-pro-btn">
                                          <a href="{{ route('product_details',$product->id) }}">view details</a>
                                      </div>
                                </div>
                          </div>
                        
                        @endforeach
                               
                     </div>
                 </div>
            </div>
       </div>
   </div>

 @endforeach  



















   <!--==================================CATEGORY SECTION END=======================-->

 


   <!---=================================COLLECTION SECTION START========================-->
   <div class="collection-section">
       <div class="container-fluid">
            <div class="row">
                 <div class="collection-heading">
                     <h3>Collection</h3>
                 </div>
                 <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                     <div class="row">



                        @foreach($shop->products as $product)

                           <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" style="padding: 2px">
                                <div class="single-product">


                                @php $x=0 @endphp
                                @foreach($product->images as $image)
                                    @if($x<=0)
                                       <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                                    @endif
                                 @php $x++ @endphp
                                 @endforeach 

                                      <h5>{{ $product->product_name }}</h5>
                                      <p>৳ {{ $product->price }}</p>
                                      <div class="rating">
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <span>(5)</span>
                                      </div>
                                      <div class="single-pro-btn">
                                         <a href="{{ route('product_details',$product->id) }}">view details</a>
                                      </div>
                                </div>
                          </div>
                        
                        @endforeach
                               
                     </div>
                 </div>
            </div>
       </div>
   </div>
   <!---=================================COLLECTION SECTION END========================-->


@endsection