<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

	include 'inc/loginsystem.php';
  include 'inc/crmsystem.php';

  $siteTitle = 'Helpdesk';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title><?php echo $pageTitle . ' - ' . $siteTitle; ?></title>
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>

    <header>

        <a href="./">
          <span><?php echo $siteTitle; ?></span>
        </a>

        <?php 
        if (isset($_SESSION["username"])) :
          echo '<span>Welcome: <strong><?php	echo $_SESSION["username"]; ?></strong></span>';
    			echo '<a href="index.php?logout="1"">Logout</a>';
        else :
          echo '<a href="login.php" role="button">Login</a>';
          echo '<a href="register.php" role="button">Register</a>';
        endif 
        ?>

    </header>
