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
                <li style="font-weight: bold;"><?php echo $_SESSION["my_fname"] . " " . $_SESSION["my_lname"]; ?></li>
                <li><a href="profile.php">Profile</a></li>
                  <?php
                  if ($_SESSION['my_user_perm'] == 'admin') :
                    echo '<li><a href="settings.php">Settings</a></li>';
                  else :endif
                  ?>
                <li><a href="index.php?logout" class="btn btn-secondary">Logout</a></li>
              </ul>
            <?php else : ?>
              <ul class="header_menu_right">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php" class="btn btn-secondary">Register</a></li>
              </ul>
            <?php endif ?>

        </div>

      </div>

    </header>
