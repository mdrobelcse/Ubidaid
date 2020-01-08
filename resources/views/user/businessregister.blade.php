 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | Register business account

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
                                  <h3>Create Business Account</h3>

                                 <form name="mybusinessregisterform" id="registerformforbusiness" action="{{ route('register') }}" method="post" onsubmit="return validatebusinessregisterform();">
                                 @csrf


                                            <div class="form-group">
                                              <label for="name">Shop name</label>
                                                 <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                                 <span class="error_msg" id="name_error_msg"></span>
                                            </div>

                                           
                                             <div class="form-group">
                                              <label for="owner_name">Shop owner name</label>
                                                 <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ old('owner_name') }}">
                                                 <span class="error_msg" id="owner_name_error_msg"></span>
                                            </div>


                                             <div class="form-group">
                                              <label for="email">Email</label>
                                                 <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                                 <span class="error_msg" id="email_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="phone">Phone</label>
                                                 <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                                  <span class="error_msg" id="phone_error_msg"></span>
                                            </div>
                                             
                                             <div class="form-group">
                                              <label for="address">Address</label>
                                                 <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                                                  <span class="error_msg" id="address_error_msg"></span>
                                            </div>
                                            <div class="form-group">
                                              <label for="phone">Account type</label>
                                                 <select  class="form-control" name="role_id" id="role_id">
                                                      <option selected="" disabled="">Select one</option>
                                                      <option value="3">Service & Consultency</option>
                                                      <option value="2">Shopping</option>
                                                      <option value="2">Food</option>
                                                 </select>
                                                 <span class="error_msg" id="role_error_msg"></span>
                                            </div>
                                             <div class="form-group">
                                              <label for="password">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" autocomplete="new-password">
                                                <span class="error_msg" id="password_error_msg"></span>

                                                @error('password')
                                                   <span class="error_msg" id="password_error_msg">{{ $message }}</span>
                                                @enderror
                                                 
                                            </div>
                                          

                                            <div class="form-group">
                                              <label for="email">Confirm-password</label>
                                                 <input type="password" class="form-control" id="confirm_password" name="password_confirmation" autocomplete="new-password">
                                                 <span class="error_msg" id="confirm_password_error_msg"></span>
                                            </div>
                                                                                            
                                            <button type="submit" class="btn-block">Submit</button>

                                     </form><br> 

                                     <a href="{{ route('register') }}">Create your account</a> ?<span> are your already resiter ?</span> <a href="{{ route('login') }}">Login</a>
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
 <script src="{{ asset('public/js/registrationforbusiness.js') }}"></script> 

   <script type="text/javascript">
    
      function validatebusinessregisterform(){

           var name             = document.mybusinessregisterform.name;
           var owner_name       = document.mybusinessregisterform.owner_name;
           var email            = document.mybusinessregisterform.email;
           var phone            = document.mybusinessregisterform.phone;
           var address          = document.mybusinessregisterform.address;
           var role_id          = document.mybusinessregisterform.role_id;
           var password         = document.mybusinessregisterform.password;
           var confirm_password         = document.mybusinessregisterform.confirm_password;
           



           var name_length = $("#name").val().length;
           var owner_name_length = $("#owner_name").val().length;
           var phone_length = $("#phone").val().length;
           var address_length = $("#address").val().length;
           var password_length = $("#password").val().length;
           var confirm_password_length = $("#confirm_password").val().length;
           
 


           if (name.value == "") {

                document.getElementById("name_error_msg").innerHTML = "the name field is required";
                return false;

           }

           if (owner_name.value == "") {

                document.getElementById("owner_name_error_msg").innerHTML = "the shop owner name field is required";
                return false;

           }

           if (name_length < 5 || name_length > 20) {

                document.getElementById("name_error_msg").innerHTML = "name should be between 5-20 character";
                return false;

           }

           if (owner_name_length < 5 || owner_name_length > 20) {

                document.getElementById("shop_owner_name_error_msg").innerHTML = "shop owner name should be between 5-20 character";
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

           
           if (role_id.selectedIndex < 1) {

                document.getElementById("role_error_msg").innerHTML = "select a account type";
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