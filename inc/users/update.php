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

	/**
	 * edit user
	 */
	if (isset($_POST['update_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}

		if (empty($fname)) {
			array_push($errors, "First name is required");
		}

		if (empty($lname)) {
			array_push($errors, "Last name is required");
		}

		// create user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE users SET email='$email', fname='$fname', lname='$lname' WHERE id='".$_SESSION['my_id']."'";
			mysqli_query($db, $query);
			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Profile updated successfully</span>
			</div>';

			// get user info from database
			$user_sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
			$result_sql = $db-> query($user_sql);

			// update session data
			if ($result_sql-> num_rows > 0) {
				while ($row_sql = $result_sql->fetch_assoc()) {
					$_SESSION['my_email'] = $row_sql["email"];
					$_SESSION['my_fname'] = $row_sql["fname"];
					$_SESSION['my_lname'] = $row_sql["lname"];
				} 
			} 

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
	 * edit password
	 */
	if (isset($_POST['update_pass'])) {
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if ($password != $password_verify) {
			array_push($errors, "The two passwords do not match");
		}

		// create user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "UPDATE users SET password='$password' WHERE id='".$_SESSION['my_id']."'";
			mysqli_query($db, $query);
			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Profile updated successfully</span>
			</div>';

			// get user info from database
			$user_sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
			$result_sql = $db-> query($user_sql);

			// update session data
			if ($result_sql-> num_rows > 0) {
				while ($row_sql = $result_sql->fetch_assoc()) {
					$_SESSION['my_email'] = $row_sql["email"];
				} 
			} 

		} else {
			$_SESSION['error'] = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Something went wrong</span>
			</div>';
		}
	}