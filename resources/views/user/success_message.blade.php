@extends('layouts.frontend.app')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/category.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/success-msg.css') }}">


@endpush


@section('searchbycategory')
    <hr>
    <div class="">
        <form action="{{ route('search') }}" method="post">
            @csrf
            <label style="color: #fff" class="searchCategory col-lg-2 col-md-2 col-sm-3 col-xs-4">Search by Category</label>
            <input type="search" name="search" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Search by Category..."><i id="filtersubmit" class="fa fa-search"></i>
            <input type="submit" name="submit" value="search">
        </form>
        <br><br>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="success-msg">
                      <h2>thsnk for your order, we will contact you as soon as possible</h2>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')


@endpush

