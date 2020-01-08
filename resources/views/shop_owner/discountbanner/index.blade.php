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
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>


                                              @if($banner->image == 'default.png')
                                                <img src="{{ asset('public/uploads/discountbanner/default/default.jpg') }}" height="200px" width="300px" alt="">
                                              @else
                                                 <img src="{{ asset('public/uploads/discountbanner/'.$banner->image) }}" height="200px" width="300px" alt="">
                                              @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.discount.edit',$banner->id) }}" class="btn btn-success btn-sm"><i class="material-icons">edit</i></a>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Image</th>
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



@endpush
