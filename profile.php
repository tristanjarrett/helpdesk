<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

	$pageTitle = 'Profile';
	 include 'header.php';

	// edit user script (after header)
	include 'inc/users/update.php';
?>

		<main>

			<div class="container">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<ul>
						<li>Username: <?php echo $_SESSION['my_username']; ?></li>
						<li>Email: <?php echo $_SESSION['my_email']; ?></li>
						<li>First Name: <?php echo $_SESSION['my_fname']; ?></li>
						<li>Last Name: <?php echo $_SESSION['my_lname']; ?></li>
					</ul>

					<hr>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="form-group">
							<label>Email: </label>
							<input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $_SESSION['my_email']; ?>">
						</div>

						<div class="form-group">
							<label>First Name: </label>
							<input class="form-control" type="text" name="fname" placeholder="First Name" value="<?php echo $_SESSION['my_fname']; ?>">
						</div>

						<div class="form-group">
							<label>Last Name: </label>
							<input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['my_lname']; ?>">
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="update_user">Update</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
