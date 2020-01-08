 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | product details 

@endsection

@section('content')

 <div class="product-details">
        <div class="container-fluid">
            <div class="row">
                  <div class="col-md-2 col-lg-2">
                      <div class="pro-details-img-list">

                        @foreach($product->images as $image)
                            <a href="{{ asset('public/uploads/product/'.$image->filename) }}" target="pro-details-img"><img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="pro-details"></a>
                        @endforeach    
                            
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <div class="pro-details-img">


                          @php $x=0 @endphp
                          @foreach($product->images as $image)
                              @if($x<=0)
                                 <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                              @endif
                           @php $x++ @endphp
                           @endforeach 


                      </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                    
                      <div class="pro-details">
                              <h3>{{ $product->product_name }}</h3>

                             <h4>Category: {{ $product->category->name }}</h4>
                              

                             <h4>Price: $ {{ $product->price }}</h4>
                             <h4>Product Type: {{ $product->pro_type == 1 ? 'Feature' : 'Non-Feature' }} </h4>


                            @if($product->user->role_id==2)

                             <form action="{{ route('user.addtocart') }}" method="post">
                              @csrf

                                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                                  <input type="hidden" name="shop_id" value="{{ $product->user_id }}">
                                  <label>Quantity</label><br>
                                  <input type="text" name="quantity" value="1"><br>
                                  <input type="submit" name="addtocart" value="add to cart">
                             </form>

                            @elseif($product->user->role_id==3)
                            
                            <form action="{{ route('user.reserve.form',$product->user_id) }}" method="get">
                              @csrf
                                  <label>Quantity</label><br>
                                  <input type="hidden" name="product_id" value="{{ $product->id }}"><br>
                                  <input type="text" name="quantity" value="1"><br>
                                  <input type="submit" name="booking" value="Booking">
                             </form>


                            @endif 




                             <p>{{ $product->product_details }}</p>
                      </div>

                  </div>
                  <div class="col-md-3 col-lg-3">
                      
                        <div class="row">
                          <div class="details-iocn">
                            <div class="col-md-3 col-lg-3">
                                 <img class="img-responsive" src="{{asset('public/frontend/images/icon/1.png')}}" alt="pro-details">
                            </div>
                             <div class="col-md-9 col-lg-9">
                                <a href="">30 Day Return & Exchange Policy. T&C apply</a>
                            </div>
                          </div> 
                        </div>
                         <div class="row">
                          <div class="details-iocn">
                            <div class="col-md-3 col-lg-3">
                                 <img class="img-responsive" src="{{asset('public/frontend/images/icon/2.png')}}" alt="pro-details">
                            </div>
                             <div class="col-md-9 col-lg-9">
                                <a href="">Cash On Delivery / Card On Delivery</a>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="details-iocn">
                            <div class="col-md-3 col-lg-3">
                                 <img class="img-responsive" src="{{asset('public/frontend/images/icon/3.png')}}" alt="pro-details">
                            </div>
                             <div class="col-md-9 col-lg-9">
                                <a href="">Bkash</a>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="details-iocn">
                            <div class="col-md-3 col-lg-3">
                                 <img class="img-responsive" src="{{asset('public/frontend/images/icon/4.png')}}" alt="pro-details">
                            </div>
                             <div class="col-md-9 col-lg-9">
                                <a href="">Debit & Credit Cards / Internet Banking</a>
                            </div>
                          </div>
                        </div>
                        
                  </div>
            </div>
        </div>
   </div>

@endsection


@push('js')

  <!--script for product details page-->

      
  <script type="text/javascript">
    
        $(document).ready(function(){


               $('.pro-details-img-list a').click(function(e){

                   e.preventDefault();
                   $('.pro-details-img img').attr("src",$(this).attr("href"));
                  // console.log("hello");

               })

        })

  </script>


@endpush