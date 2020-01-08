$(function(){



 

		    $("#name_error_msg").hide();
		    $("#email_error_msg").hide();
		    $("#phone_error_msg").hide();
		    $("#address_error_msg").hide();
		    $("#payment_error_msg").hide(); 
		    $("#transanctoinid_error_msg").hide(); 
		     
		   
		    
			 

			var error_name = false;
			var error_email = false;
			var error_phone = false;
			var error_address = false;
			var error_payment = false;
			var error_transanctionid = false;
			 
			
			 
			 

			$("#name").focusout(function() {

				 check_name();
				
			});

			$("#email").focusout(function() {

				 check_email();
				
			});

			$("#phone").focusout(function() {

				 check_phone();
				
			});


			$("#shipping_address").focusout(function() {

				 check_address();
				
			});

			

			$("#payment_method").focusout(function() {

				 check_payment();
				
			});

			$("#transanction_id").focusout(function() {

				 check_transanctionid();
				
			});

			 
           //check name  
			function check_name() {
	
				var name_length = $("#name").val().length;


				if (name_length =='0') {

                    $("#name_error_msg").html("the name field is required");
					$("#name_error_msg").show();
					error_name = true;

				}else if(name_length < 5 || name_length > 20) {

					$("#name_error_msg").html("name should be between 5-20 characters");
					$("#name_error_msg").show();
					error_name = true;
				} else {
					$("#name_error_msg").hide();
				}
			
			}


            //check email
			function check_email() {

					var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				    var email_length = $("#email").val().length;    
	            
	                if (email_length == '0') {
	                    
	                    $("#email_error_msg").html("the email field is required");
						$("#email_error_msg").show();
						error_email = true;

	                }else if(pattern.test($("#email").val())) {
						$("#email_error_msg").hide();
					} else {
						$("#email_error_msg").html("this is invalid email address");
						$("#email_error_msg").show();
						error_email = true;
					}
 

          }

          //check phone        /(^(\+88|0088)?(01){1}[56789]{1}(\d){8})$/

          function check_phone() {

					var pattern = new RegExp(/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/);
				    var phone_length = $("#phone").val().length;    
	            
	                if (phone_length == '0') {
	                    
	                    $("#phone_error_msg").html("the phone number is required");
						$("#phone_error_msg").show();
						error_phone = true;

	                }else if(pattern.test($("#phone").val())) {
						$("#phone_error_msg").hide();
					} else {
						$("#phone_error_msg").html("this is invalid phone number");
						$("#phone_error_msg").show();
						error_phone = true;
					}
 

          }



          //check address  
			function check_address() {
	
				var shipping_address_length = $("#shipping_address").val().length;


				if (shipping_address_length =='0') {

                    $("#address_error_msg").html("the address field is required");
					$("#address_error_msg").show();
					error_address = true;

				}else if(shipping_address_length < 5 ) {

					$("#address_error_msg").html("address should be greater then 5 characters");
					$("#address_error_msg").show();
					error_address = true;
				} else {
					$("#address_error_msg").hide();
				}
			
			}


          //check roll number

         	function check_payment() {
  
                // var payment_method = $("#payment_method").val();
                  var payment_method    = document.myform.payment_method;


			   if (payment_method.selectedIndex < 1) {

                    $("#payment_error_msg").html("select a payment method");
					$("#payment_error_msg").show();
					error_payment = true;

				}else {
					$("#payment_error_msg").hide();
				}
				 
          }



          //check transanction id

          function check_transanctionid() {

					var pattern = new RegExp(/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/);
				    var phone_length = $("#transanction_id").val().length;    
	            
	                if (phone_length == '0') {
	                    
	                    $("#transanctoinid_error_msg").html("the transanction id is required");
						$("#transanctoinid_error_msg").show();
						error_transanctionid = true;

	                }else if(pattern.test($("#transanction_id").val())) {
						$("#transanctoinid_error_msg").hide();
					} else {
						$("#transanctoinid_error_msg").html("this is invalid transanction id number");
						$("#transanctoinid_error_msg").show();
						error_transanctionid = true;
					}
 

          }


          $("#reservation").submit(function() {
											
				error_name = false;
				error_email = false;
				error_phone = false;
				error_address = false;
				error_payment = false;
				error_transanctionid = false;
				 
			    
				 
													
				check_name();
				check_email();
				check_phone();
				check_address();
				check_payment();
				check_transanctionid();
				 
				
				
				if(error_name == false && error_email == false && error_phone == false && error_address == false && error_payment == false && error_transanctionid == false) {
					return true;
				} else {
					return false;	
				}

			});



	 

});