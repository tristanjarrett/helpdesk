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
	require './inc/config/database.php';

	// start security
	if ($_SESSION['my_user_perm'] == 'admin') {

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
				$_SESSION['success'] = '<span style="color: green;">New user created successfully</span>';
			} else {
				$_SESSION['error'] = '<span style="color: red;">Something went wrong</span>';
			}
		}

		/**
		 * delete user
		 */
		if (isset($_GET['delete'])) {

			$id = $_GET['delete'];

			// allow delete if not self
			if ($_SESSION['my_id'] == $id) {
				$_SESSION['error'] = '<span style="color: red;">You cannot delete yourself!</span>';
			} else {
				$query = "DELETE FROM users WHERE id='$id'";
				mysqli_query($db, $query);
				$_SESSION['success'] = '<span style="color: green;">User deleted successfully</span>';
			}

		}

	// end security
}
