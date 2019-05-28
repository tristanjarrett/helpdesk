<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

  include 'inc/auth.php';

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

            <?php if (isset($_SESSION["username"])) : ?>
            <span>
              <a href="./">Dashboard</a>
              <a href="new-ticket.php">New ticket</a>
            </span>
            <?php else : ?>

            <?php endif ?>
          </span>

            <?php
            if (isset($_SESSION["username"])) : ?>
              <span>
                <?php echo $_SESSION["username"]; ?>
                <a href="profile.php">Profile</a>
                  <?php if ($_SESSION['username'] == 'tristan') : ?>
                    <a href="settings.php">Settings</a>
                  <?php else : ?>
                  <?php endif ?>
                <a href="index.php?logout">Logout</a>
              </span>
            <?php else : ?>
              <span>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
              </span>
            <?php endif ?>

        </div>

      </div>

    </header>
