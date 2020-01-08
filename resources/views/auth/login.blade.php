@extends('layouts.frontend.app')

@section('title')

   Unidaid | Login

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
                                  <h3>Log in</h3>
                                      <form name="myloginform" id="loginform" action="{{ route('login') }}" method="post" autocomplete="off" onsubmit="return validateloginform();">

                                        @csrf

                                             <!-- <div class="form-group">
                                              <label for="email">Email</label>
                                                 <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                                 <span class="error_msg" id="email_error_msg"></span>
                                            </div> -->
                                             <!-- <div class="form-group">
                                              <label for="phone">Password</label>
                                                 <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                                                 <span class="error_msg" id="password_error_msg"></span>

                                                 @error('password')
                                                       <span class="error_msg" id="password_error_msg">{{ $message }}</span>
                                                 @enderror
                                            </div> -->

                                            <div class="form-group">
                                              <label for="email">Email address:</label>
                                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                              @error('email')
                                                 <span style="color: red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                 </span>
                                              @enderror
                                          </div>

                                             <div class="form-group">
                                                <label for="pwd">Password:</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                       @error('password')
                                                         <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span>
                                                       @enderror
                                            </div>


                                            <button type="submit" class="btn-block">Log in</button>


                                     </form><br>

                                     <a href="{{ route('register') }}">Create account</a> ?<span> are your already resiter ?</span> <a href="{{ route('login') }}">Login</a><br><br>
                                    <a href="{{ route('user.password.request') }}">Forgot Your Password ?</a>
                                </div>
                           </div>
                      </div>
                  </div>
             </div>
         </div>
    </div>

   <!--===========================LOGIN FORM SECTION END============================-->

@endsection


@push('js')

<!---script-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
 <script src="{{ asset('public/js/login.js') }}"></script>

   <script type="text/javascript">

      function validateloginform(){


           var email         = document.myloginform.email;
           var password      = document.myloginform.password;


           var password_length = $("#password").val().length;



           if (email.value == "") {

                document.getElementById("email_error_msg").innerHTML = "the email field is required";
                return false;

           }

           if (email.value.indexOf("@", 0) < 0) {

                document.getElementById("email_error_msg").innerHTML = "this is invalid email";
                return false;

           }
           if (email.value.indexOf(".", 0) < 0) {

                document.getElementById("email_error_msg").innerHTML = "this is invalid email";
                return false;

           }


           if (password.value == "") {

                document.getElementById("password_error_msg").innerHTML = "password field is required";
                return false;

           }

            if (password_length < 8) {

                document.getElementById("password_error_msg").innerHTML = "password contain min 8 character";
                return false;

           }

      }//end method



  </script>




@endpush
