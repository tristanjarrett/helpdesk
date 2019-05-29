<?php

	// start session if not running
	if(!isset($_SESSION)) {
  	session_start();
	}

	// connect database
	require './inc/config/database.php';

	/**
	 * create new user
	 */
	if (isset($_POST['update_user'])) {
		
	}