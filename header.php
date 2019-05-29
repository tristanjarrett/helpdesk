<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['my_id']);
		header("location: login.php");
	}

  require 'config.php';

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

        <div class="d-flex justify-content-between align-items-center">

          <span class="d-flex align-items-center">
            <a href="./" class="brand">
              <img src="images/logo.png" alt="<?php echo $siteTitle; ?>">
            </a>

            <?php if (isset($_SESSION["my_id"])) : ?>
            <span class="header_menu_left">
              <?php if ($_SESSION['my_user_perm'] == 'admin' || $_SESSION['my_user_perm'] == 'tech' ) : 
                echo '<a href="./">Dashboard</a>';
              else : 
              endif 
              ?>
              <a href="new-ticket.php">Log a ticket</a>
            </span>
            <?php else : ?>

            <?php endif ?>
          </span>

            <?php
            if (isset($_SESSION["my_id"])) : ?>
              <span class="header_menu_right">
                <strong><?php echo $_SESSION["my_fname"] . " " . $_SESSION["my_lname"]; ?></strong>
                <a href="profile.php">Profile</a>
                  <?php 
                  if ($_SESSION['my_user_perm'] == 'admin') : 
                    echo '<a href="settings.php">Settings</a>';
                  else :endif 
                  ?>
                <a href="index.php?logout">Logout</a>
              </span>
            <?php else : ?>
              <span class="header_menu_right">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
              </span>
            <?php endif ?>

        </div>

      </div>

    </header>
