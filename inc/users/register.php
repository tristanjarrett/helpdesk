<?php

	// start session if not running
	if(!isset($_SESSION)) {
  	session_start();
	}

	// variable declaration
	$errors = array();

	// connect database
	require './inc/config/database.php';

	/**
	 * register new user
	 */
	if (isset($_POST['register_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if ($password != $password_verify) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$user_perm = "user";

			$query = "INSERT INTO users (username, fname, lname, email, password, user_perm) VALUES('$username', '$fname', '$lname', '$email', '$password', '$user_perm')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;

			// get user info from database
			$user_sql = "SELECT * from users WHERE username='".$_SESSION['username']."'";
			$result_sql = $db-> query($user_sql);

			// set session data
			if ($result_sql-> num_rows > 0) {
				while ($row_sql = $result_sql->fetch_assoc()) {
					$_SESSION['my_id'] = $row_sql["id"];
					$_SESSION['my_username'] = $row_sql["username"];
					$_SESSION['my_fname'] = $row_sql["fname"];
					$_SESSION['my_lname'] = $row_sql["lname"];
					$_SESSION['my_email'] = $row_sql["email"];
					$_SESSION['my_user_perm'] = $row_sql["user_perm"];
					$_SESSION['my_password'] = $row_sql["password"];
				}
			} 

			header('location: ./');

		}
	}
