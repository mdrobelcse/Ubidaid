$(function(){

		    $("#email_error_msg").hide();
		    $("#password_error_msg").hide();
		    


			var error_email = false;
			var error_password = false;
			

			 

			$("#email").focusout(function() {

				 check_email();
				
			});

			$("#password").focusout(function() {

				 check_password();
				
			});

 

			 
         

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





     


          //check password

          function check_password() {

				    var password_length = $("#password").val().length;    
	            
	                if (password_length == '0') {
	                    
	                    $("#password_error_msg").html("the password field is required");
						$("#password_error_msg").show();
						error_password = true;

	                }else if(password_length <8) {
						$("#password_error_msg").html("password contain min 8 character");
						$("#password_error_msg").show();
						error_password = true;
					} else {
						$("#password_error_msg").hide();
					}
 

          }


          $("#myloginform").submit(function() {
											
				 
				error_email = false;
				error_password = false;
					
				
				check_email();
				check_password();
			 
				if(error_email == false && error_password == false) {
					return true;
				} else {
					return false;	
				}

			});



	 

});