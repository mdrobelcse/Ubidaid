 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | reservation 

@endsection

@section('content')


   <!--===========================RESERVE FORM SECTION START============================-->

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
                                  <h3>Shipping information</h3>
                                       <form name="myform" id="reservation" action="{{ route('user.reservation.confirm') }}" method="post" onsubmit="return validateForm();">
			                           @csrf
			                                 <div class="form-group">
                                                 <input type="hidden" class="form-control" id="quantity" name="quantity" value="{{ $quantity }}">
                                            </div>

                                            <div class="form-group">
                                                 <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{ $product_id }}">
                                            </div>

                                             <div class="form-group">
                                                 <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}">
                                            </div>
                                           
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
                                              <label for="shipping_address">Address</label>
                                                 <input type="text" class="form-control" id="shipping_address" name="shipping_address">
                                                 <span class="error_msg" id="address_error_msg"></span>
                                            </div>
                                            <div class="form-group">
                                              <label for="phone">Payment method</label>
                                                 <select  class="form-control" name="payment_method" id="payment_method">
                                                      <option selected="" disabled="">Select payment method</option>

                                                        @foreach($paymentmethods as $paymentmethod)
		                                                       <option value="{{ $paymentmethod->slug }}">{{ $paymentmethod->name }}</option>
                                                         @endforeach


                                                 </select>
                                                 <span class="error_msg" id="payment_error_msg"></span>
                                            </div>
                                             
                                            @foreach($paymentnumbers as $paymentnumber)

                                              <div class="form-group paymentinfo-hide" id="{{ $paymentnumber->payment_name }}">
                                                <label for="paymentinfo">Payment info</label>
                                                  <div class="form-control">
                                                    <span>Number</span>:{{ $paymentnumber->number }}
                                                  </div>
                                                  <div class="form-control"><span>Account type</span>:{{ $paymentnumber->account_type }}</div>
                                              </div>

                                            @endforeach

                                             <div class="form-group">
                                              <label for="address">Transanction ID</label>
                                                 <input type="text" class="form-control" id="transanction_id" name="transanction_id">
                                                 <span class="error_msg" id="transanctoinid_error_msg"></span>
                                            </div>
                                             
                                            <button type="submit" class="btn-block">Confirm reserve</button>

                                     </form><br> 

                                </div>
                           </div>
                      </div>
                  </div>
             </div>
         </div>
    </div>

   <!--===========================RESERVE FORM SECTION END============================-->

@endsection




@push('js')

<!-----> 
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
 <script src="{{ asset('public/js/jquery.js') }}"></script> 

   <script type="text/javascript">
    
      function validateForm(){

           var name          = document.myform.name;
           var email         = document.myform.email;
           var phone         = document.myform.phone;
           var shipping_address         = document.myform.shipping_address;
           var payment_method          = document.myform.payment_method;
           var transanction_id          = document.myform.transanction_id;
       


           if (name.value == "") {

                document.getElementById("name_error_msg").innerHTML = "the name field is required";
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


           if (shipping_address.value == "") {

                document.getElementById("address_error_msg").innerHTML = "the address field is required";
                return false;

           }

           if (payment_method.selectedIndex < 1) {

                document.getElementById("payment_error_msg").innerHTML = "select a payment method";
                return false;

           }

           if (transanction_id.value == "") {

                document.getElementById("transanctoinid_error_msg").innerHTML = "please enter your transanction id";
                return false;

           }

          
 

      }//end method



  </script>

   <!--script for select payment method-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).change(function(){

            var payemtn_method = $("#payment_method").val();

            console.log(payemtn_method);

            if(payemtn_method == 'bkash'){

                $("#bkash").removeClass('paymentinfo-hide');
                $("#rocket").addClass('paymentinfo-hide');

            }else if(payemtn_method == 'rocket'){

                $("#rocket").removeClass('paymentinfo-hide');
                $("#bkash").addClass('paymentinfo-hide');
            }


        })
    </script>


@endpush