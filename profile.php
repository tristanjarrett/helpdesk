<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

	$pageTitle = 'Profile';
 	include 'header.php';
?>

		<main>

			<div class="container">

				<div class="global_panel">

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<ul>
						<li>User ID: <?php echo $_SESSION['my_id']; ?></li>
						<li>Username: <?php echo $_SESSION['my_username']; ?></li>
						<li>Email: <?php echo $_SESSION['my_email']; ?></li>
						<li>Fist Name: <?php echo $_SESSION['my_fname']; ?></li>
						<li>Last Name: <?php echo $_SESSION['my_lname']; ?></li>
						<li>User Level: <?php echo $_SESSION['my_user_perm']; ?></li>
					</ul>
					

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
