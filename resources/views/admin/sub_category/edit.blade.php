@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Sub cat</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit sub cat</li>
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
                        <form action="{{ route('admin.subcategory.update',$subcat->id) }}" method="post" class="form-horizontal form-material">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Sub Category</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line" value="{{ $subcat->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Category</label>
                                <div class="col-sm-12">
                                    <select name="category" class="form-control form-control-line">

                                        <option selected disabled>category</option>

                                        @foreach($categories as $category)

                                            <option {{ $category->id == $subcat->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach


                                    </select>
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
