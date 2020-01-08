@extends('layouts.frontend.app')

@section('title')

    Ubidaid | Change password

@endsection

@section('content')



    <!--===========================REGISTER FORM SECTION START============================-->

    <div class="register-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-md-offset-3 col-lg-offset-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="register-title">
                                <!--  <h2>Ubidaid</h2> -->
                                <img class="img-responsive" src="{{ asset('public/frontend/images/logo/logo.png')}}">
                            </div>
                            <div class="register-form">
                                <h3>Change password</h3>

                                <form action="{{ route('user.update.password') }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label for="name">Old password</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
                                        <span class="error_msg" id="name_error_msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">New password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                                        <span class="error_msg" id="email_error_msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Confirm password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Enter confirm password">
                                        <span class="error_msg" id="phone_error_msg"></span>
                                    </div>

                                    <button type="submit" class="btn-block">Update</button>

                                </form><br>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===========================REGISTER FORM SECTION END============================-->


@endsection





