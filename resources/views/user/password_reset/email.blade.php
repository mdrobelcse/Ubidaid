@extends('layouts.frontend.app')

@section('title')

    Unidaid | Send rest link

@endsection

@section('content')

    <!--===========================LOGIN FORM SECTION START============================-->

    <div class="register-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-md-offset-3 col-lg-offset-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="register-title">
                                <!-- <h2>Ubidaid</h2> -->
                                <img class="img-responsive" src="{{ asset('public/frontend/images/logo/logo.png')}}">
                            </div>
                            <div class="register-form">
                                <h3>Reset password</h3>
                                <form  action="{{ route('user.password.email') }}" method="post" autocomplete="off">

                                @csrf
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                        @error('email')
                                        <span style="color: red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                 </span>
                                        @enderror
                                    </div>



                                    <button type="submit" class="btn-block">Send Password ResetLink</button>

                                </form><br>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===========================LOGIN FORM SECTION END============================-->

@endsection


