<?php

	// start session if not running
	if(!isset($_SESSION)) {
  	session_start();
  }

	// variable declaration
	$username = "";
	$errors = array();
	$_SESSION['success'] = "";
	$_SESSION['error'] = "";

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

		// login user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
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
			$query = "INSERT INTO users (username, fname, lname, email, password) VALUES('$username', '$fname', '$lname', '$email', '$password')";
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

	/**
	 * create new user
	 */
	if (isset($_POST['create_user'])) {
		$user_perm = mysqli_real_escape_string($db, $_POST['user_perm']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		if (empty($user_perm)) {
			array_push($errors, "User level is required");
		}
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

		// create user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "INSERT INTO users (user_perm, username, fname, lname, email, password) VALUES('$user_perm', '$username', '$fname', '$lname', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>New user created successfully</span>
			</div>';
		} else {
			$_SESSION['error'] = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Something went wrong</span>
			</div>';
		}
	}
