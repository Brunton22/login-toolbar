<?php

	session_start();

	include 'connect_db.php';

	//if user is already logged in

	if (isset($_SESSION['userName'])) {

		$username = $_SESSION['userName'];

	}

	//if user is logging in

	else {

		$username = $_POST['l_uname'];
		$password = $_POST['l_pass'];

	}

	$sql = "SELECT * FROM users WHERE username = '$username' ";

	$result = mysqli_query($conn, $sql);

	//if user already logged in

	if (isset($_SESSION['userName'])) {

		if ($result = mysqli_query($conn, $sql)) {

			while ($row = mysqli_fetch_row($result)) {

				$return = array(
				user_id => $row[0],
				username => $row[1],
			);

			$_SESSION['userName'] = $username;

			echo json_encode($return);
			
			}
		}

		else {

		$return['login'] = '0';

		echo json_encode($return);
		
		}

	}

	//if user is logging in
		
	else {

		if ($result = mysqli_query($conn, $sql)) {

			while ($row = mysqli_fetch_row($result)) {

				$user_id = $row[0];
				$username = $row[1];
				$hashpass = $row[2];
			}	

			if (password_verify($password, $hashpass)) {

				$return = array(
				user_id => $user_id,
				username => $username,
				login => '1',
			);

			$_SESSION['userName'] = $username;

			echo json_encode($return);
			
			}

			//if password is wrong

			else {

			$return['login'] = '0';

			echo json_encode($return);
			
			}
		}

	}

?>