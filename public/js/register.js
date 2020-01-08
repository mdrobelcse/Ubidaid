$(function(){



 

		    $("#name_error_msg").hide();
		    $("#email_error_msg").hide();
		    $("#phone_error_msg").hide();
		    $("#address_error_msg").hide();
		    $("#password_error_msg").hide(); 
		    $("#confirm_password_error_msg").hide(); 
		     
		   
		    
			 

			var error_name = false;
			var error_email = false;
			var error_phone = false;
			var error_address = false;
			var error_password = false;
			var error_confirm_password = false;



			 

			$("#name").focusout(function() {

				 check_name();
				
			});

			$("#email").focusout(function() {

				 check_email();
				
			});

			$("#phone").focusout(function() {

				 check_phone();
				
			});


			$("#address").focusout(function() {

				 check_address();
				
			});

			

			$("#password").focusout(function() {

				 check_password();
				
			});

			$("#confirm_password").focusout(function() {

				 check_confirm_password();
				
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
	
				var address_length = $("#address").val().length;


				if (address_length =='0') {

                    $("#address_error_msg").html("the address field is required");
					$("#address_error_msg").show();
					error_address = true;

				}else if(address_length < 5 ) {

					$("#address_error_msg").html("address should be min 5 characters");
					$("#address_error_msg").show();
					error_address = true;
				} else {
					$("#address_error_msg").hide();
				}
			
			}


          //check password

         	function check_password() {
  
                var password_length = $("#password").val().length;
				
                 if (password_length == '0') {

                    $("#password_error_msg").html("password field is required");
					$("#password_error_msg").show();
					error_password = true;

                 }else if(password_length  < 8 || password_length  > 18) {
					$("#password_error_msg").html("password should between 8-18 characters");
					$("#password_error_msg").show();
					error_password = true;
				} else {
					$("#password_error_msg").hide();
				}
				 
          }



          //check confirm password

          function check_confirm_password() {

				var password = $("#password").val();
				var retype_password = $("#confirm_password").val();
				
				if(password !=  retype_password) {
					$("#confirm_password_error_msg").html("passwords don't match");
					$("#confirm_password_error_msg").show();
					error_confirm_password = true;
				} else {
					$("#confirm_password_error_msg").hide();
				}

          }


          $("#registerform").submit(function() {
											
				error_name = false;
				error_email = false;
				error_phone = false;
				error_address = false;
				error_password = false;
				error_confirm_password = false;
				 
				 
													
				check_name();
				check_email();
				check_phone();
				check_address();
				check_password();
				check_confirm_password();
				 
				 
				
				
				if(error_name == false && error_email == false && error_phone == false && error_address == false && error_password == false && error_confirm_password == false) {
					return true;
				} else {
					return false;	
				}

			});



	 

});