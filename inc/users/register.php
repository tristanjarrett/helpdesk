<?php

	// start session if not running
	if(!isset($_SESSION)) {
  	session_start();
  }

	// variable declaration
	$errors = array();
	$_SESSION['success'] = "";
	$_SESSION['error'] = "";

	// connect database
	require_once './inc/config/database.php';

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
		$user_perm = "user";

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
			$query = "INSERT INTO users (username, fname, lname, email, password, user_perm) VALUES('$username', '$fname', '$lname', '$email', '$password', '$user_perm')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Registration was successful
			</span>
			</div>';
			header('location: ./');
		} else {
			$_SESSION['error'] = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Something went wrong</span>
			</div>';
		}
	}