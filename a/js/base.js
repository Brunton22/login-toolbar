$(document).ready(function() {

	//sign up modal function

	$(function() {
		$('#register_button').avgrund({

			height: 220,
			width: 300,
			holderClass: 'custom',
			showClose: true,
			showCloseText: 'close',
			onBlurContainer: '.container',
			template: 			
			'<form class="sign_up_form">' +
				'<label for"u_name_signup" class="signup_label labels">Choose a Username: </label>' +
					'<input class="u_name_signup signup_box" type="text" name="u_name_signup" data-role="none" autocomplete="off">' + 
					'<p class="warning signup_message uname_taken hide">Username taken, please choose another.</p>' + 
					'<p class="warning signup_message uname_blank hide">Please choose a Username</p>' + '<br>' +
				'<label for="pass_signup" class="signup_label labels">Choose a Password: </label>' +
					'<input class="pass_signup signup_box" type="password" name="pass_signup" data-role="none">' +
					'<p class="warning signup_message pword_blank hide">Please choose a password.</p>' +
					'<p class="warning signup_message pword_short hide">Password should be more than 6 characters</p>' + '<br>' +
				'<button class="signup_form_input signup_button" type="signup" name="signup_submit" data-role="none">Sign Up</button>' +
			'</form>'
		});
	});

	//user has logged in through login form or hasn't signed out

	window.user_logged_in = function(data) {

		var d = new Date();
		var h = d.getHours();

		if (h <= 11) {

			$('.greeting').html('Good Morning ' +data.username)
		}

		else if (h <= 16) {

			$('.greeting').html('Good Afternoon ' +data.username)
		}

		else {

			$('.greeting').html('Good Evening ' +data.username)
		}

		$('.login_form').hide();
		$('.warning').addClass('hide');
		$('.logged_in_header').show();
	}

	//login

	$('.login_button').on('click', function(e) {

		e.preventDefault();

		var l_username = $('.u_name_login').val();
		var l_password = $('.pass_login').val();

		$.ajax({
			url: 'a/php/login.php',
			type: 'POST',
			dataType: 'json',
			data: {l_uname: l_username, l_pass: l_password},
			success: function(data) {

				if ( data.login == '1' ) {

					user_logged_in(data);

				}

				else {

					$('.wrong_pass').removeClass('hide');
				}
			}
		})

		$('.u_name_login').val('');
		$('.pass_login').val('');
	});

	//sign out

	function signout() {

		$('.account_list').hide();
		$('.login_form').show();
		$('.logged_in_header').hide();
	}

	$('.signout_button_li').on('click', function(){

		$.ajax({
			url: 'a/php/signout.php',
			type: 'GET',
			success: function(data) {

				signout();

			}	
		})
	})

	//registering

	$('body').on('click', '.signup_button', function(e) {

		$('.warning').addClass('hide');

		e.preventDefault();

		var username = $('.u_name_signup').val();
		var password = $('.pass_signup').val();
		var passlength = password.length;

		if (username == '') {

			$('.uname_blank').removeClass('hide');
		}

		else if ((username != '') && (password == '')) {

			$('.pword_blank').removeClass('hide')
		}

		else if (passlength < 6 ) {

			$('.pword_short').removeClass('hide');
		}

		else {

			$.ajax({
				url: 'a/php/signup.php',
				type: 'POST',
				data: {uname: username, pass: password},
				success: function(data) {

					if (data != '1'){

						$('.u_name_signup').val('');
						$('.pass_signup').val('');
						deactivate();

						$.ajax({
							url: 'a/php/login.php',
							type: 'GET',
							dataType: 'json',
							success: function(data) {

								user_logged_in(data);
							}
						})
					}

					else {

						$('.uname_taken').removeClass('hide');
						$('.pass_signup').val('');
					}
				}
			})
		}
	})

	//account button and account info

	$('.account_button').on('click', function(){

		$('.account_list').toggle();
	})
});