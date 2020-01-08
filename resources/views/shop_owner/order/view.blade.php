@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Table</li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                @if($order_details->order_status == 1)
                    <button class="btn btn-danger waves-effect btn-sm pull-right" type="button" onclick="completeOrder({{ $order_details->id }})">
                         mark the order as complete
                    </button>
                    <form id="delete-form-{{ $order_details->id }}" action="{{ route('shop.order.complete',$order_details->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                @elseif($order_details->order_status == 2)
                    <p class="pull-right btn btn-success">Order is completed</p>
                @endif
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Customer name</label>
                                <div class="col-md-12">
                                    <input type="text" name="shipping_address" value="{{ $order_details->name }}" class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Shipping address</label>
                                <div class="col-md-12">
                                    <input type="text" name="shipping_address" value="{{ $order_details->shipping_address }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" value="{{ $order_details->phone }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Payment method</label>
                                <div class="col-md-12">
                                    <input type="text" name="payment_method" value="{{ $order_details->payment_method }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Transanction ID</label>
                                <div class="col-md-12">
                                    <input type="text" name="transanction_id" value="{{ $order_details->transanction_id }}" class="form-control" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Basic Table</h4>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Product quantity</th>
                                    <th>Total price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $totalprice = 0; @endphp
                                @foreach($allproductbyorderid as $key=>$allproduct)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                        
                                        @php $x = 0 @endphp 
                                        @foreach($allproduct->product->images as $image) 
                                        @if($x <= 0)

                                            <img src="{{ asset('public/uploads/product/'.$image->filename ) }}" height="70px" width="70px" alt="" />

                                         @endif  
                                         @php $x++ @endphp    
                                        @endforeach


                                        </td>
                                        <td>{{ $allproduct->product->product_name }}</td>
                                        <td>{{ $allproduct->product->price }}</td>
                                        <td>{{ $allproduct->product_quantity }}</td>
                                        <td>
                                            {{ 
                                                $total = $allproduct->product_quantity*$allproduct->product->price 
                                            }}
                                        </td>

                                    </tr>


                                    @php

                                        $totalprice = $totalprice+ $total;
                                        $tex = $totalprice*Auth::user()->text/100;
                                        $shippingcost = Auth::user()->shipping_cost;


                                        
                                        if($shippingcost==0){
                                            
                                            $shippingcost = 5;
                                        }

                                        if(Auth::user()->text==0){
                                            
                                            $tex = $totalprice*1/100;
                                        }

                                    @endphp

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product image</th>
                                    <th>Product name</th>
                                    <th>Product Price</th>
                                    <th>Product quantity</th>
                                    <th>Sub total with {{ Auth::user()->text==0 ? '1': Auth::user()->text }}% text+ {{ $shippingcost }}$ shipping cost:{{ $totalprice+$tex+$shippingcost }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection


@push('js')

    <!--javascripts swwtalert start-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deletePaymentnumber(id)
        {
            swal({
                title:"Red Stapler",
                text: "Are You Sure? you want to delete this?",
                buttons: {
                    cancel: true,
                    confirm: "delete"
                }
            }).then( val => {
                if(val)  {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                }
                else {
                    swal("Your data is safe!");
                }
            });
        }
    </script>
    <!--javascripts sweet alert end-->





    <!--javascripts swwtalert start-->

    <script>
        function completeOrder(id)
        {
            swal({
                title:"Red Stapler",
                text: "Are You Sure? the order is complete?",
                buttons: {
                    cancel: true,
                    confirm: "accpet"
                }
            }).then( val => {
                if(val)  {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                }
                else {
                    swal("Your dont accept it!");
                }
            });
        }
    </script>
@endpush
