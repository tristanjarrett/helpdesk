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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>

    <header class="header">

      <div class="container mx-auto flex">

        <div class="flex-auto">
          <a href="./" class="brand">
            <?php echo $siteTitle; ?>
          </a>
        </div>

        <div class="flex-initial">
          <?php 
          if (isset($_SESSION["username"])) : ?>
            <span>Welcome: <?php echo $_SESSION["username"]; ?></span>
            <a href="settings.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Settings</a>
            <a href="index.php?logout='1'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Logout</a>
          <?php else : ?>
            <a href="login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Login</a>
            <a href="register.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Register</a>
          <?php endif ?>
        </div>

      </div>

    </header>
