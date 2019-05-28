<?php

	// start session if not running
	if(!isset($_SESSION)) {
  	session_start();
  }

	// variable declaration
	$errors = array();

	// connect database
	require_once './inc/config/database.php';

	/**
	 * login user
	 */
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// login user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				header('location: ./');
			} else {
				// error if no details match
				array_push($errors, "Incorrect Username or Password");
			}
		}
	}