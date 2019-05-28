<?php

	// start session if not running
	if(!isset($_SESSION)) {
		session_start();
	}

  // variable declaration
	$errors = array();
	$timestamp = date('d/m/Y');

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
			$query = "INSERT INTO tickets (type, priority, timestamp, summary, description) VALUES('$type', '$priority', '$timestamp', '$summary', '$description')";
			mysqli_query($db, $query);
			header('location: ./');
		}
	}