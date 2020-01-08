@extends('layouts.frontend.app')
 
@section('title')

   Ubidaid | Contact 

@endsection

@section('content')


   <!--===========================CONTACT US SECTION START============================-->

   <div class="contactus-section">
       <div class="container-fluid">
           <div class="row">
              <div class="contact-title">
                  <h2>Contact Us</h2>
              </div>
               <div class="col-sm-12">
                    <div class="col-md-8 col-lg-8">
                        <div class="row">
                              <div class="contact-form">

                                  <form name="mycontactform" id="contactform" action="{{ route('send.contact.message') }}" method="post" onsubmit="return validatecontactform();">
                                  	@csrf
                                  	   <div class="form-group">
                                           <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $shopid }}">
                                      </div>
                                      <div class="form-group">
                                           <input type="text" class="form-control" id="name" name="name" placeholder="Name*">
                                           <span class="error_msg" id="name_error_msg"></span>
                                      </div>
                                       <div class="form-group">
                                           <input type="text" class="form-control" id="email" name="email" placeholder="Email*">
                                            <span class="error_msg" id="email_error_msg"></span>
                                      </div>
                                       <div class="form-group">
                                           <input type="test" class="form-control" id="subject" name="subject" placeholder="Subject*">
                                            <span class="error_msg" id="subject_error_msg"></span>
                                      </div>
                                       <div class="form-group">
                                           <textarea class="form-control" id="message" rows="5" cols="20" name="message" placeholder="Message*"></textarea>  
                                           <span class="error_msg" id="message_error_msg"></span>
                                      </div> 
                                      <button type="submit">Submit</button>
                                </form>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                         <div class="row">
                             
                            <div class="col-sm-12">
                                  <div class="contact-information">
                                      <div class="contact-header">
                                          <div class="row">
                                              <div class="col-sm-12 padding-left padding-right">
                                                    <h2>Need 24/7 Support</h2>
                                                    <h3>Contact support</h3>
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="contact-body">
                                          <div class="row padding-bottom">
                                               <div class="col-sm-12 padding-left padding-right">
                                                   <div class="col-sm-3">
                                                        <img class="img-responsive" src="{{ asset('public/frontend/images/contact/1.png')}}" alt="" height="50px" width="50px">
                                                   </div>
                                                   <div class="col-sm-9">
                                                        <h3>Call sales now</h3>
                                                        <p>+{{ $shopinfo ? $shopinfo->mobile : "They don't provide mobile number yet." }}</p>
                                                   </div>
                                               </div>
                                          </div>
                                           <div class="row padding-bottom">
                                               <div class="col-sm-12 padding-left padding-right">
                                                   <div class="col-sm-3">
                                                        <img class="img-responsive" src="{{ asset('public/frontend/images/contact/3.png')}}" alt="" height="50px" width="50px">
                                                   </div>
                                                   <div class="col-sm-9">
                                                        <h3>Salse Hour</h3>
                                                        <p>{{ $shopinfo ? $shopinfo->time : "They don't provide salse hour yet." }}</p>
                                                       <!--  <p>+1-512-827-3500</p> -->
                                                   </div>
                                               </div>
                                          </div>
                                           <div class="row padding-bottom">
                                               <div class="col-sm-12 padding-left padding-right">
                                                   <div class="col-sm-3">
                                                        <img class="img-responsive" src="{{ asset('public/frontend/images/contact/2.png')}}" alt="" height="50px" width="50px">
                                                   </div>
                                                   <div class="col-sm-9">
                                                        <h3>Mailing Address</h3>
                                                        <!-- <p>Wp Engine</p>
                                                        <p>504 Lavaca Street, Suite 1000</p>
                                                        <p>Austin,Texas 78701</p>
                                                        <p>United State</p> -->
                                                        <p>
                                                           {{ $shopinfo ? $shopinfo->address : "They don't provide address yet." }}
                                                        </p>
                                                   </div>
                                               </div>
                                          </div>
                                      </div>
                                 </div>
                             </div>
                         </div>
                    </div>
               </div>
           </div>
       </div>
   </div>

   <!--===========================CONTACT US SECTION END============================-->

@endsection






@push('js')

<!--javascript---> 
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
 <script src="{{ asset('public/js/contact.js') }}"></script> 

   <script type="text/javascript">
    
      function validatecontactform(){

           var name          = document.mycontactform.name;
           var email         = document.mycontactform.email;
           var subject       = document.mycontactform.subject;
           var message       = document.mycontactform.message;



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

           if (subject.value == "") {

                document.getElementById("subject_error_msg").innerHTML = "the subject field is required";
                return false;

           }

           if (message.value == "") {

                document.getElementById("message_error_msg").innerHTML = "message field is required";
                return false;

           }

 

          
 

      }//end method



  </script>
 

@endpush