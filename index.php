<?php 

session_start();

?>


<!DOCtype HTML>

<html>

	<head>
		<title>Login Form</title>

		<script src="a/js/jquery-1.12.0.min.js"></script>
		<script src="a/js/jquery-ui.min.js"></script>
		<script src="a/js/jquery.mobile-1.4.5.min.js"></script>
		<script src="a/js/jquery.avgrund.js"></script>
		<script src="a/js/base.js"></script>

		<link rel="stylesheet" type="text/css" href="a/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="a/css/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" type="text/css" href="a/css/avgrund.css">
		<link rel="stylesheet" type="text/css" href="a/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="a/css/main.css">


	</head>

	<?php include 'a/php/check_logged_in.php'; ?>

 	<body>
		<div id="body_container">
			<div class="header">
				<div class="r_header">
					<form class="login_form">
						<label for="u_name_login" class="header_text login_label labels">Username: </label>
							<input class="login_form_input login_box u_name_login" type="text" name="u_name_login" data-role="none" autocomplete="off">
						<label for="pass_login" class="header_text login_label labels">Password: </label>
							<input class="login_form_input login_box pass_login" type="password" data-role="none" name="pass_login">
						<button class="login_form_input login_button" name="login_submit" data-role="none" value="Login">Login</button><br>
						<p class="warning wrong_pass hide">Username and Password do not match.</p>
						<a href="#" id="register_button">Not a member? Click Here to Register</a>
					</form>
					<div class="logged_in_header">
						<p class="header_text greeting"></p>
						<i class="fa fa-user fa-2x account_button"></i>
							<ul class="account_list">
								<li class="header_text account_list_li myaccount_li account_li">My Account</li>
								<li class="header_text account_list_li signout_button_li account_li">Sign Out</li>
							</ul>
						<!--<button class="signout_button">Sign Out</button>-->
					</div>
				</div>
			</div>
		</div>
	</body>