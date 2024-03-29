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
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}

		if (empty($email)) {
			array_push($errors, "Email is required");
		}

		// update user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE users SET username='$username', email='$email', fname='$fname', lname='$lname' WHERE id='".$_SESSION['my_id']."'";
			mysqli_query($db, $query);

			// get user info from database
			$user_sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
			$result_sql = $db-> query($user_sql);

			// update session data
			if ($result_sql-> num_rows > 0) {
				while ($row_sql = $result_sql->fetch_assoc()) {
					$_SESSION['my_username'] = $row_sql["username"];
					$_SESSION['my_email'] = $row_sql["email"];
					$_SESSION['my_fname'] = $row_sql["fname"];
					$_SESSION['my_lname'] = $row_sql["lname"];
				}
			}

			$_SESSION['success'] = '<span style="color: green;">Profile updated successfully</span>';

		} else {
			$_SESSION['error'] = '<span style="color: red;">Something went wrong</span>';
		}
	}

	/**
	 * edit password
	 */
	if (isset($_POST['update_pass'])) {
		$password_old = mysqli_real_escape_string($db, $_POST['password_old']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_verify = mysqli_real_escape_string($db, $_POST['password_verify']);

		if (empty($password_old)) {
			array_push($errors, "Old password is required");
		} else {
			$password_old = md5($password_old);
			if ($password_old != $_SESSION['my_password']) {
				array_push($errors, "The old password is incorrect");
			}
		}

		if (empty($password)) {
			array_push($errors, "New password is required");
		}

		if ($password != $password_verify) {
			array_push($errors, "The two passwords do not match");
		}

		// update password if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "UPDATE users SET password='$password' WHERE id='".$_SESSION['my_id']."'";
			mysqli_query($db, $query);
			$_SESSION['success'] = '<span style="color: green;">Password updated successfully</span>';

			// get user info from database
			$user_sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
			$result_sql = $db-> query($user_sql);

			// update session data
			if ($result_sql-> num_rows > 0) {
				while ($row_sql = $result_sql->fetch_assoc()) {
					$_SESSION['my_password'] = $row_sql["password"];
				}
			}

		} else {
			$_SESSION['error'] = '<span style="color: red;">Something went wrong</span>';
		}
	}
