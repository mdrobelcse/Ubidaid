 @extends('layouts.frontend.app')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/category.css') }}">
   <!--  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" /> -->
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/checkout.css') }}">


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
        	  <div class="col-sm-12 col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        	  	   <div class="checkout-form">
        	  	   	   <div class="row">
        	  	   	   	   <div class="col-sm-12">
        	  	   	   	   	     <form method="POST" action="{{ route('user.order') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="hidden" name="shop_id" value="{{ $user->id }}" class="form-control">

                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping address') }}</label>

                                <div class="col-md-6">
                                    <input id="shipping_address" type="text" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value="{{ old('shipping_address') }}" required autocomplete="shipping_address" autofocus>

                                    @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Payment method') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="payment_method" id="payment_method">
                                        <option selected disabled>Select payment method</option>

                                        @foreach($paymentmethods as $paymentmethod)
                                            <option value="{{ $paymentmethod->slug }}">{{ $paymentmethod->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        @foreach($paymentnumbers as $paymentnumber)
                            <div id="{{ $paymentnumber->payment_name }}" class="form-group row hidden">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Payment info') }}</label>

                                <div class="col-md-6">
                                    <div class="form-control"><span>Number</span>:{{ $paymentnumber->number }}</div>
                                    <div class="form-control"><span>Account type</span>:{{ $paymentnumber->account_type }}</div>
                                </div>
                            </div>
                        @endforeach


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Transanction ID') }}</label>

                                <div class="col-md-6">
                                    <input id="transanction_id" type="text" class="form-control @error('transanction_id') is-invalid @enderror" name="transanction_id" value="{{ old('transanction_id') }}" required autocomplete="transanction_id">

                                    @error('transanction_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Order now') }}
                                    </button>
                                </div>
                            </div>
                        </form>
        	  	   	   	   </div>
        	  	   	   </div>
        	  	   </div>
        	  </div>
        </div>
    </div>

@endsection


@push('js')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).change(function(){

          var payemtn_method = $("#payment_method").val();

            if(payemtn_method == 'bkash'){

                $("#bkash").removeClass('hidden');
                $("#rocket").addClass('hidden');

            }else if(payemtn_method == 'rocket'){

                $("#rocket").removeClass('hidden');
                $("#bkash").addClass('hidden');
            }


        })
    </script>
@endpush

