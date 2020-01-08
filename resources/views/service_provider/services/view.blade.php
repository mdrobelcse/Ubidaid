@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Product</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product</li>
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
                         
                            <div class="form-group">
                                <label class="col-md-12">Service Name</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $product->product_name }}" name="servic_name" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Price</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $product->price }}" name="price" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Category</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $product->category->name }}" name="category" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Sub-ategory</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $product->subcategory->name }}" name="subcategory" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Service Image</label>
                                <div class="col-md-12">
                                    @foreach($productimages as $image)

                                    <img src="{{ asset('public/uploads/product/'.$image->filename) }}" alt="" height="130px" width="200px" style="border-radius: 5px;border: 1px solid #000;">

                                    @endforeach
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label class="col-md-12">Product Details</label>
                                <div class="col-md-12">
                                    <textarea name="product_details" rows="5" class="form-control form-control-line" readonly>{{ $product->product_details }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('service_provider.service.index') }}" class="btn btn-success">Go back</a>
                                </div>
                            </div>
                        
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