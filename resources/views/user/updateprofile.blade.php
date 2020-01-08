 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | Register

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
                                  <h3>Update profile</h3>

                                 <form name="myregisterform" id="registerform" action="{{ route('user.profile.update') }}" method="post" onsubmit="return validateregisterform();" enctype="multipart/form-data">
                                 @csrf
                                 @method('put')


                                           <div class="form-group">
                                                 <input type="hidden" class="form-control" id="role_id" name="role_id" value="4">
                                            </div>


                                            <div class="form-group">
                                              <label for="name">Name</label>
                                                 <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                 <span class="error_msg" id="name_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="email">Email</label>
                                                 <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                                 <span class="error_msg" id="email_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="phone">Phone</label>
                                                 <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                                  <span class="error_msg" id="phone_error_msg"></span>
                                            </div>

                                             <div class="form-group">
                                              <label for="address">Address</label>
                                                 <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                                                  <span class="error_msg" id="address_error_msg"></span>
                                            </div>



                                            <div class="form-group">
                                                 <label for="email">Update profile image</label>
                                                 <input type="file" class="form-control" id="confirm_password" name="profile">

                                            </div>

                                           <a href="{{ route('user.changepassword.index') }}">Change password</a><br><br><br>

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





@push('js')

<!---javascript code-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
 <script src="{{ asset('public/js/register.js') }}"></script>

   <script type="text/javascript">

      function validateregisterform(){

           var name             = document.myregisterform.name;
           var email            = document.myregisterform.email;
           var phone            = document.myregisterform.phone;
           var address          = document.myregisterform.address;
           var password         = document.myregisterform.password;
           var confirm_password         = document.myregisterform.confirm_password;




           var name_length = $("#name").val().length;
           var phone_length = $("#phone").val().length;
           var address_length = $("#address").val().length;
           var password_length = $("#password").val().length;
           var confirm_password_length = $("#confirm_password").val().length;




           if (name.value == "") {

                document.getElementById("name_error_msg").innerHTML = "the name field is required";
                return false;

           }

           if (name_length < 5 || name_length > 20) {

                document.getElementById("name_error_msg").innerHTML = "name should be between 5-20 character";
                return false;

           }

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

           if (phone.value == "") {

                document.getElementById("phone_error_msg").innerHTML = "the phone number is required";
                return false;

           }

           if (phone_length < 11 || phone_length > 11) {

                document.getElementById("phone_error_msg").innerHTML = "the phone number contain 11 character";
                return false;

           }


           if (address.value == "") {

                document.getElementById("address_error_msg").innerHTML = "the address field is required";
                return false;

           }

           if (address_length < 5) {

                document.getElementById("address_error_msg").innerHTML = "addredd contain min 5 character";
                return false;

           }
           if (password.value == "") {

                document.getElementById("password_error_msg").innerHTML = "the password field is required";
                return false;

           }
            if (password_length < 8) {

                document.getElementById("password_error_msg").innerHTML = "password should be min 8 character";
                return false;

           }


           if (confirm_password.value == "") {

                document.getElementById("confirm_password_error_msg").innerHTML = "the cinfirm password field is required";
                return false;

           }
            if (confirm_password_length < 8) {

                document.getElementById("confirm_password_error_msg").innerHTML = "confirm password should be min 8 character";
                return false;

           }





      }



  </script>




@endpush
