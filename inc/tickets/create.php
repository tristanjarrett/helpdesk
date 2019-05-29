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
	 * create new ticket
	 */
	if (isset($_POST['create_ticket'])) {
		// receive all input values from the form
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$priority = mysqli_real_escape_string($db, $_POST['priority']);
		$summary = mysqli_real_escape_string($db, $_POST['summary']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$timestamp = date('d/m/Y');
		$logged_by = $_SESSION['my_fname'] . " " . $_SESSION['my_lname'];

		// ensure that the form is correctly filled
		if (empty($type)) {
			array_push($errors, "Call type is required");
		}
		if (empty($priority)) {
			array_push($errors, "Priority is required");
		}
		if (empty($summary)) {
			array_push($errors, "Summary is required");
		}
		if (empty($description)) {
			array_push($errors, "Description is required");
		}

		// create ticket if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO tickets (type, priority, timestamp, summary, description, logged_by) VALUES('$type', '$priority', '$timestamp', '$summary', '$description', '$logged_by')";
			mysqli_query($db, $query);

			$_SESSION['success'] = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<span>New ticket created successfully</span>
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
