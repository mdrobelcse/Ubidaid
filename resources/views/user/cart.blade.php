@extends('layouts.frontend.app')

@section('title')

   Ubidaid | cart 

@endsection

@section('content')

<!--=======================CART SECTION START====================-->

     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                  <div class="cart table-responsive">

                           <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th width="25%">Item image</th>
                                <th width="15%">Price</th>
                                <th width="35%">Quantity</th>
                                <th width="15%">Total</th>
                                <th width="10%">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                            
                            @php $totalprice = 0; @endphp

                            @if($products->count() > 0)
                            @foreach($products as $product)
                            

                              <tr>
                                <td>

                                  @php $x=0 @endphp
                                  @foreach($product->product->images as $image)
                                      @if($x<=0)
                                         <img class="img-responsive" src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="">
                                      @endif
                                   @php $x++ @endphp
                                   @endforeach 

                                </td>
                                <td>
                                     <h3>${{ $product->product->price }}</h3>
                                </td>
                                <td>
                                      <form action="{{ route('user.updateQuantity',$product->id) }}" method="post">
                                       @csrf
                                       <input type="number" value="{{ $product->product_quantity }}" name="product_quantity">
                                       <button type="submit" class="updatebtn">update</button>

                                   </form>
                                </td>
                                <td>
                                     <h3>${{ $total = $product->product_quantity*$product->product->price }}</h3>
                                </td>
                                <td>
                                    <a href="{{ route('user.removeProduct',$product->id) }}"><i class="fas fa-times"></i></a>
                                </td>
                              </tr>



                               @php


                                   $totalprice = $totalprice+ $total;
                                   $user_id = $product->product->user_id;
                                   $tax = App\User::find($user_id)->text;
                                   $shippingcost = App\User::find($user_id)->shipping_cost;

                               @endphp

                            @endforeach

                            @else
                                <tr>
                                   <td colspan="5">
                                       <h3>Your cart is empty</h3>
                                   </td>
                                </tr>
                            @endif
 
                               
                                 

                            </tbody>
                          </table>



                  </div>
            </div>
        </div>
        <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                   <div class="subtotal">
                        <div class="row">
                           <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Cart sub total</th>
                                <th>tax</th>
                                <th>Shipping cost</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <h3>${{ $totalprice }}</h3>
                                </td>
                                <td>
                                     <h3>
                                         @if($tax == 0)

                                           {{ $tax = 1 }}

                                         @else
                                         
                                            {{ $tax = $tax }}

                                         @endif

                                     %</h3>
                                    @php
                                        $tex = $totalprice*$tax/100;
                                    @endphp
                                </td>
                                <td>
                                    <h3>@if($shippingcost == 0)

                                           {{ $shippingcost = 5 }}

                                         @else
                                         
                                            {{ $shippingcost = $shippingcost }}

                                         @endif
                                       $</h3>
                                </td>
                                <td>
                                     <h3>${{ $tex+$totalprice+$shippingcost }}</h3>
                                </td>

                              </tr>




                            </tbody>
                          </table>


                              <a href="{{ route('user.checkout',$user_id) }}" class="pull-right">Checkout</a>

                        </div>
                   </div>
              </div>
        </div>
    </div>



   <!--===========================CART SECTION END=====================-->


@endsection
