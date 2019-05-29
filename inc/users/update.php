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
	 * create new user
	 */
	if (isset($_POST['update_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}

		// create user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE users SET email='$email' WHERE id='".$_SESSION['my_id']."'";
			mysqli_query($db, $query);
			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>Email updated successfully</span>
			</div>';

			// get user info from database
			$user_sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
			$result_sql = $db-> query($user_sql);

			// set session data
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