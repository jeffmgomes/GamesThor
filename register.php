<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Games Thor project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	

    <!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Register a new Account</div>

						<form onSubmit="return validate()" action="php/createAccount.php" method="POST" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="fname" class="contact_form_name input_field" placeholder="Your First name" required="required" data-error="First Name is required.">								
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">								
								<input type="text" name="lname" class="contact_form_name input_field" placeholder="Your Last name" required="required" data-error="Last Name is required.">                              
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="email" name="email" class="contact_form_name input_field" placeholder="Your Email" required="required" data-error="Email is required."> 
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="street" class="contact_form_name input_field" style="width: 500px" placeholder="Your Address" required="required" data-error="Address is required.">                              
							</div>
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">								
                                <input type="text" name="suburb" class="contact_form_name input_field" placeholder="Suburb" required="required" data-error="Suburb is required.">
                                <input type="text" name="city" class="contact_form_name input_field" placeholder="City" required="required" data-error="City is required.">
								<input type="text" name="state" class="contact_form_name input_field" placeholder="State" required="required" data-error="City is required.">
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="password" id="password" name="password" class="contact_form_name input_field" placeholder="Your Password"  required="required" data-error="Password is required.">
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">                                
                                <input type="password" id="confirmPassword" name="confirmPassword" class="contact_form_name input_field" placeholder="Confirm Your Password"  required="required" data-error="Confirm password is required.">                             
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">                                
                                <p id="errorMessage"></p>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Register</button>
							</div>
						</form>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Copyright -->

<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/custom.js"></script>
<script src="js/register.js"></script>
</body>

</html>
