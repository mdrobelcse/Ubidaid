@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Post</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit post</li>
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
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line" value="{{ $contact->name }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">E-mail</label>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control form-control-line" value="{{ $contact->email }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Subject</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line" value="{{ $contact->subject }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea name="post_details" class="form-control form-control-line" rows="10" readonly="">{{ $contact->message }}</textarea>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <div class="col-sm-12">
                                     <a href="{{ route('shop.contact.index') }}" class="btn btn-success">Go back</a>
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
