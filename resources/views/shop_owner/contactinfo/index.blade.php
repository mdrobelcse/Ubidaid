@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Contact information</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Update Contact information</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->

            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">


                     @if($shopinfo)

                          <form action="{{ route('shop.update.shopinfo') }}" method="post" class="form-horizontal form-material">
                            @csrf
                            @method('PUT')

                     @else

                     <form action="{{ route('shop.shopinfo.store') }}" method="post" class="form-horizontal form-material">
                            @csrf

                     @endif


                        
                            <div class="form-group">
                                <label class="col-md-12">Mobile:</label>
                                <div class="col-md-12">
                                    <input type="text" name="mobile" class="form-control form-control-line" value="{{ $shopinfo ? $shopinfo->mobile :'' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Salse Hour:</label>
                                <div class="col-md-12">
                                    <input type="text" name="salsehour" class="form-control form-control-line" placeholder="10am-09pm" value="{{ $shopinfo ? $shopinfo->time :'' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Address:</label>
                                <div class="col-md-12">
                                    <textarea rows="5" type="text" name="address" class="form-control">{{ $shopinfo ? $shopinfo->address :'' }}</textarea>
                                </div>
                            </div>

                         


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection
