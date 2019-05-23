<?php

	// variable declaration
	$username = "";
	$email = "";
	$errors = array();
	$_SESSION['success'] = "";

	// connect database
	require_once 'config/database.php';

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

		if (count($errors) == 0) {
			$password = md5($password); // submit encrypted password
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['success'] = "You are now logged in";
				$_SESSION['username'] = $username;
				header('location: ./');
			} else {
				array_push($errors, "Incorrect Username or Password");
			}
		}
	}

	/**
	 * register new user
	 */ 
	if (isset($_POST['register_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		// form validation: ensure that the form is correctly filled
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
			$password = md5($password); // encrypt the password before saving to the database
			$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success'] = "You are now registered";
			$_SESSION['username'] = $username;
			header('location: ./');
		}
	}

	/**
	 * create new user
	 */ 
	if (isset($_POST['create_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		// form validation: ensure that the form is correctly filled
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
			$password = md5($password); // encrypt the password before saving to the database
			$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success'] = "New user created successfully";
		}
	}