 @extends('layouts.frontend.app')

@section('title')

   Unidaid | Register 

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
                                      <h2>Ubidaid</h2>
                                </div>
                                <div class="register-form">
                                  <h3>Create Account</h3>

                                 <form name="myregisterform" id="registerform" action="{{ route('register') }}" method="post" onsubmit="return validateregisterform();">
                                 @csrf


                                            <div class="form-group">
                                              <label for="name">Your name</label>
                                                 <input type="text" class="form-control" id="name" name="name">
                                                 <span class="error_msg" id="name_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="email">Email</label>
                                                 <input type="text" class="form-control" id="email" name="email">
                                                 <span class="error_msg" id="email_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="phone">Phone</label>
                                                 <input type="text" class="form-control" id="phone" name="phone">
                                                  <span class="error_msg" id="phone_error_msg"></span>
                                            </div>
                                             
                                             <div class="form-group">
                                              <label for="address">Address</label>
                                                 <input type="text" class="form-control" id="address" name="address">
                                                  <span class="error_msg" id="address_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="password">Password</label>
                                                 <input type="password" class="form-control" id="password" name="password">
                                                 <span class="error_msg" id="password_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="email">Confirm-password</label>
                                                 <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                                                 <span class="error_msg" id="confirm_password_error_msg"></span>
                                            </div>
                                              
                                            <button type="submit" class="btn-block">Submit</button>

                                     </form><br> 

                                     <a href="{{ route('business.register') }}">Create your business account</a> ?<span> are your already resiter ?</span> <a href="{{ route('login') }}">Login</a>
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
<!-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
 <script src="{{ asset('public/js/register.js') }}"></script>  -->

   <script type="text/javascript">
    
      function validateregisterform(){

           var name             = document.myregisterform.name;
           var email            = document.myregisterform.email;
           var phone            = document.myregisterform.phone;
           var address          = document.myregisterform.address;
           var password         = document.myregisterform.password;
           



           var name_length = $("#name").val().length;
           var phone_length = $("#phone").val().length;
           var address_length = $("#address").val().length;
           var password_length = $("#password").val().length;
           
 


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
            

          
 

      }//end method



  </script>

  


@endpush