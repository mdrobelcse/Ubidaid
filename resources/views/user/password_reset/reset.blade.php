@extends('layouts.frontend.app')

@section('title')

    Unidaid | reset password

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
                                <form  action="{{ route('user.password.update')  }}" method="post" autocomplete="off">

                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input id="id" type="hidden" class="form-control @error('email') is-invalid @enderror" value="{{ $user_id }}" readonly name="id" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Password:</label>
                                        <input id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Confirm password:</label>
                                        <input id="confirm_password" type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    </div>



                                    <button type="submit" class="btn-block">Reset password</button>

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


