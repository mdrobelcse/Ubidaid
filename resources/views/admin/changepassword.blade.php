@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Change password</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Change password</li>
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
                        <form action="{{ route('admin.update.password') }}" method="post" class="form-horizontal form-material">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Old password</label>
                                <div class="col-md-12">
                                    <input type="password" id="old_password" class="form-control form-control-line" name="old_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">New password</label>
                                <div class="col-md-12">
                                    <input type="password" id="password" class="form-control form-control-line" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Confirm password</label>
                                <div class="col-md-12">
                                    <input type="password" id="confirm_password" class="form-control form-control-line"  name="password_confirmation">
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
