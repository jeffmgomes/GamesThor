<?php 
	session_start(); 

	if(isset($_SESSION['customerId'])){
		session_destroy();
		$signOutMessage = " Successfully Sign Out ";
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign In</title>
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
				<div class="col-lg-12 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Sign In</div>
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<p><?php 
									echo (isset($_GET['created']) ? "Your account was successfully created. Please Sign In." : "");
									echo (isset($signOutMessage) ? $signOutMessage : "");
								?></p>
							</div>
						<form action="php/login.php" method="POST" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="email" class="contact_form_name input_field" placeholder="Your Email" required="required" data-error="Email is required.">								
							</div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">								
								<input type="password" name="password" class="contact_form_name input_field" placeholder="Password" required="required" data-error="Password is required.">                              
							</div>                            
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">                                
                                <p><?php echo (isset($_GET['wrongpass']) ? "Wrong Email or Password. Please Try Again!" : "") ?></p>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Sign In</button>
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
