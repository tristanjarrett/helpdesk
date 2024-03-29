<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['my_id']);
		header("location: login.php");
	}

  require './inc/config/database.php';
  require './inc/functions.php';

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

    <header class="header">
      <div class="container-full">

        <div class="nav_flex">

          <span class="nav_flex">
            <a href="./" class="brand">
              <img src="images/logo.png" alt="<?php echo $siteTitle; ?>">
            </a>

            <?php if (isset($_SESSION["my_id"])) : ?>
            <ul class="header_menu_left">
              <?php if ($_SESSION['my_user_perm'] == 'admin' || $_SESSION['my_user_perm'] == 'tech' ) :
                echo '<li><a href="./">Dashboard</a></li>';
              else :
              endif
              ?>
              <li><a href="new-request.php">New Request</a></li>
              <li><a href="my-requests.php">My Requests</a></li>
            </ul>
            <?php else :
              echo $siteTitle;
            endif ?>
          </span>

            <?php
            if (isset($_SESSION["my_id"])) : ?>
              <ul class="header_menu_right">
                <li class="display_name"><?php displayName(); ?></li>
                <li><a href="profile.php">Profile</a></li>
                  <?php
                  if ($_SESSION['my_user_perm'] == 'admin') :
                    echo '<li><a href="settings.php">Settings</a></li>';
                  else :
                  endif
                  ?>
                <li><a href="index.php?logout" class="button-md button-primary">Logout</a></li>
              </ul>
            <?php else : ?>
              <ul class="header_menu_right">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php" class="button-md button-primary">Register</a></li>
              </ul>
            <?php endif ?>

        </div>

      </div>

    </header>
