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
                <a href="{{ route('admin.paymentname.create') }}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Add Payment Method</a>
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
                                    <th>Payment Method</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($payments as $key=>$payment)

                                   <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>
                                           <a href="{{ route('admin.paymentname.edit',$payment->id) }}" class="btn btn-success btn-sm"><i class="material-icons">create</i></a>
                                            <button class="btn btn-danger waves-effect btn-sm" type="button" onclick="deletePaymentmethod({{ $payment->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $payment->id }}" action="{{ route('admin.paymentname.destroy',$payment->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                   </tr>

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Created at</th>
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
        function deletePaymentmethod(id)
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
@endpush