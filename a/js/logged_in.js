$(document).ready(function() {
	
	$.ajax({
		url: 'a/php/login.php',
		type: 'GET',
		dataType: 'json',
		success: function(data){

			user_logged_in(data);

		}
	})

});