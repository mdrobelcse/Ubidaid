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
                @if($reserve->order_status == 1)
                    <button class="btn btn-danger waves-effect btn-sm pull-right" type="button" onclick="completeReserve({{ $reserve->id }})">
                         Mark the order as complete
                    </button>
                    <form id="delete-form-{{ $reserve->id }}" action="{{ route('service_provider.reservation.complete',$reserve->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                @elseif($reserve->order_status == 2)
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
                                    <input type="text" name="shipping_address" value="{{ $reserve->name }}" class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Shipping address</label>
                                <div class="col-md-12">
                                    <input type="text" name="shipping_address" value="{{ $reserve->shipping_address }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" value="{{ $reserve->phone }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Payment method</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" value="{{ $reserve->payment_method }}" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Transanction ID</label>
                                <div class="col-md-12">
                                    <input type="text" name="transanction_id" value="{{ $reserve->transanction_id }}" class="form-control" readonly>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('service_provider.reservation.index') }}" class="btn btn-success">Go Back</a>
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

                                    <th>Product Image</th>
                                    <th>Product name</th>
                                    <th>Product quantity</th>
                                    <th>Total price</th>
                                </tr>
                                </thead>
                                <tbody>
                                   


                                    <tr>

                                        <td> 
                                            
                                            @php $x = 0 @endphp
                                            @foreach($reserve->product->images as $image)

                                            @if($x <= 0)

                                            <img src="{{ asset('public/uploads/product/'.$image->filename) }}" height="70px" width="70px" alt="" />
                                            @endif  
                                            @php $x++ @endphp
                                            @endforeach


                                        </td>
                                        <td>{{ $reserve->product->product_name }}</td>
                                        <td>{{ $reserve->quantity }}</td>
                                        <td>{{ $reserve->product->price*$reserve->quantity }}</td>


                                    </tr>



                                </tbody>
                                <tfoot>
                                <tr>

                                    <th>Product Image</th>
                                    <th>Product name</th>
                                    <th>Product quantity</th>
                                    <th>Total price</th>
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
        function completeReserve(id)
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
