<?php

	session_start();

	include 'connect_db.php';

	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$table = 'users';

	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$sql = "SELECT * FROM $table WHERE username = '$username'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_query($conn, $sql)) {

		$count = mysqli_num_rows($result);

		if ($count > 0) {

			echo '1';
		}

		else {

			$sql = "INSERT INTO $table (username, p_word, admin) VALUES ('$username', '$password_hash', '0')";

			if (mysqli_query($conn, $sql)) {

				$_SESSION['userName'] = $username;
   		
   				echo "New record created successfully";
   			}

   			else {
    	
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
	}

?>