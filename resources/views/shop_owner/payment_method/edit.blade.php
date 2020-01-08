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
                        <form action="{{ route('shop.paymentmethod.update',$payment_number->id) }}" method="post" class="form-horizontal form-material">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Payment number</label>
                                <div class="col-md-12">
                                    <input type="text" name="number" value="{{ $payment_number->number }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Account type</label>
                                <div class="col-md-12">
                                    <input type="text" name="account_type" value="{{ $payment_number->account_type }}" class="form-control form-control-line">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-12">Select payment type</label>
                                <div class="col-sm-12">
                                    <select name="payment_type" class="form-control form-control-line">

                                        <option selected disabled>select payment type</option>
                                        @foreach($payment_names as $payment_name)
                                            <option {{ $payment_number->payment_name == $payment_name->slug ? 'selected' : '' }} value="{{ $payment_name->slug }}">{{ $payment_name->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Payment Details</label>
                                <div class="col-md-12">
                                    <textarea name="description" rows="5" class="form-control form-control-line">{{ $payment_number->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Save</button>
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
