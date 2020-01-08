$(function(){



 

		    $("#name_error_msg").hide();
		    $("#email_error_msg").hide();
		    $("#subject_error_msg").hide();
		    $("#message_error_msg").hide();
		     

			var error_name = false;
			var error_email = false;
			var error_subject = false;
			var error_message = false;

			
			 
			 

			$("#name").focusout(function() {

				 check_name();
				
			});

			$("#email").focusout(function() {

				 check_email();
				
			});

			$("#subject").focusout(function() {

				 check_subject();
				
			});


			$("#message").focusout(function() {

				 check_message();
				
			});

			

			 
			 
           //check name  
			function check_name() {
	
				var name_length = $("#name").val().length;


				if (name_length =='0') {

                    $("#name_error_msg").html("the name field is required");
					$("#name_error_msg").show();
					error_name = true;

				}else if(name_length < 5 ) {

					$("#name_error_msg").html("name field must contain 5 characters");
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

         
          //check subject  
			function check_subject() {
	
				var subject_length = $("#subject").val().length;


				if (subject_length =='0') {

                    $("#subject_error_msg").html("the subject field is required");
					$("#subject_error_msg").show();
					error_subject = true;

				}else if(subject_length < 5 ) {

					$("#subject_error_msg").html("subjec field must contain 5 characters");
					$("#subject_error_msg").show();
					error_subject = true;
				} else {
					$("#subject_error_msg").hide();
				}
			
			}



			//check message  
			function check_message() {
	
				var message_length = $("#message").val().length;


				if (message_length =='0') {

                    $("#message_error_msg").html("the message field is required");
					$("#message_error_msg").show();
					error_message = true;

				}else if(message_length < 5 ) {

					$("#message_error_msg").html("message field must contain 5 characters");
					$("#message_error_msg").show();
					error_message = true;
				} else {
					$("#message_error_msg").hide();
				}
			
			}


         



         
          $("#contactform").submit(function() {
											
				error_name = false;
				error_email = false;
				error_subject = false;
				error_message = false;
											
				check_name();
				check_email();
				check_subject();
				check_message();
				 
				 
				
				
				if(error_name == false && error_email == false  && error_subject == false && error_message == false) {
					return true;
				} else {
					return false;	
				}

			});



	 

});