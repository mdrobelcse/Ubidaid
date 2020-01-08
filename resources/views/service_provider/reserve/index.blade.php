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

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
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
                                    <th>Customer name</th>
                                    <th>Phone</th>
                                    <th>Order status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allreserves as $key=>$reserve)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $reserve->name }}</td>
                                        <td>{{ $reserve->phone }}</td>
                                        <td>

                                            @if($reserve->order_status == 0)

                                                <p class="badge badge-danger">Pending Order</p>

                                            @elseif($reserve->order_status == 1)

                                                <p class="badge badge-success">Accepted Order</p>

                                            @elseif($reserve->order_status == 2)

                                                <p class="badge badge-info">Completed Order</p>

                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('service_provider.reservation.show',$reserve->id) }}" class="btn btn-success btn-sm"><i class="material-icons">visibility</i></a>

                                            @if($reserve->order_status == 0)

                                                <button class="btn btn-info waves-effect btn-sm" type="button" onclick="confirmReserve({{ $reserve->id }})">
                                                    <i class="material-icons">check_circle_outline</i>
                                                </button>
                                                <form id="delete-form-{{ $reserve->id }}" action="{{ route('service_provider.reservation.confirm',$reserve->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>

                                            @elseif($reserve->order_status == 1 || $reserve->order_status == 2)

                                                <button class="btn btn-danger waves-effect btn-sm" type="button" onclick="deleteReservation({{ $reserve->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $reserve->id }}" action="{{ route('service_provider.reservation.destroy',$reserve->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            @endif

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Phone</th>
                                    <th>Order status</th>
                                    <th>Action</th>
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
        function confirmReserve(id)
        {
            swal({
                title:"Red Stapler",
                text: "Are You Sure? you want to confirm this order?",
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


    <script>
        function deleteReservation(id)
        {
            swal({
                title:"Red Stapler",
                text: "Are You Sure? you want to delete this order?",
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
                    swal("Your dont accept it!");
                }
            });
        }
    </script>

    <!--javascripts sweet alert end-->
@endpush
