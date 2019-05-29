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
						<li>Username: <?php echo $_SESSION['my_username']; ?></li>
						<li>Email: <?php echo $_SESSION['my_email']; ?></li>
						<li>Fist Name: <?php echo $_SESSION['my_fname']; ?></li>
						<li>Last Name: <?php echo $_SESSION['my_lname']; ?></li>
						<li>User Level: <?php echo $_SESSION['my_user_perm']; ?></li>
					</ul>

					<form action="" method="POST">

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="username" placeholder="Username">
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="update_user">Update</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
