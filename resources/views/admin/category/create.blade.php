@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Category</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Category</li>
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
                        <form action="{{ route('admin.category.store') }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-12">Category Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Category Image</label>
                                <div class="col-md-12">
                                    <input type="file" name="category_img" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Type of service</label>
                                <div class="col-sm-12">
                                    <select name="typeofservice" class="form-control form-control-line">

                                        <option selected disabled>Type of service</option>

                                         @foreach($servicetypes as $servicetype)

                                            <option value="{{ $servicetype->id }}">{{ $servicetype->name }}</option>

                                         @endforeach


                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Add Category</button>
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