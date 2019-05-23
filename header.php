<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

  include 'inc/users.php';
  include 'inc/tickets.php';

  $siteTitle = 'Helpdesk';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title><?php echo $pageTitle . ' - ' . $siteTitle; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>

    <header class="header">
      
      <div class="container-fluid">

        <div class="row d-flex align-items-center">

          <div class="col-auto">
            <a href="./" class="brand">
              <img src="images/logo.png" alt="<?php echo $siteTitle; ?>">
            </a>
          </div>
          
          <div class="col">
            <ul class="list_left">
              <li><a href="./">Dashboard</a></li>
              <li><a href="new-ticket.php">New ticket</a></li>
            </ul>
          </div>
          
          <div class="col-auto">
            <?php 
            if (isset($_SESSION["username"])) : ?>
              <div class="text-right">Hello <?php echo $_SESSION["username"]; ?>!</div>
              <ul class="list_right">
                <li><a href="settings.php">Settings</a></li>
                <li><a href="index.php?logout='1'">Logout</a></li>
              </ul>
            <?php else : ?>
              <ul class="list_right">
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
              </ul>
            <?php endif ?>
          </div>

        </div>

      </div>

    </header>
