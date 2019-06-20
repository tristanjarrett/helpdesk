<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	include 'inc/users/update.php';

	$pageTitle = 'Profile';
	include 'header.php';
?>

		<main>

			<div class="container-lg">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<div class="tab-menu">
					  <button class="tab-link" onclick="openTab(event, 'details')" id="defaultOpen">Edit details</button><!--
					--><button class="tab-link" onclick="openTab(event, 'password')">Change password</button>
					</div>

					<div id="details" class="tab-content">
						<h2>Edit details</h2>

						<form action="" method="POST">

							<?php include('inc/errors.php'); ?>

							<div class="input-group">
								<label>Username</label>
								<input class="" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['my_username']; ?>">
							</div>

							<div class="input-group">
								<label>Name</label>
								<input class="" type="text" name="fname" placeholder="Name" value="<?php echo $_SESSION['my_fname']; ?>">
							</div>

							<div class="input-group">
								<label>Surname</label>
								<input class="" type="text" name="lname" placeholder="Surname" value="<?php echo $_SESSION['my_lname']; ?>">
							</div>

							<div class="input-group">
								<label>Email</label>
								<input class="" type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['my_email']; ?>">
							</div>

							<div class="text-right">
								<button class="button-md button-primary" type="submit" name="update_user">Update</button>
							</div>

						</form>
					</div>

					<div id="password" class="tab-content">
						<h2>Change password</h2>

						<form action="" method="POST">

							<?php include('inc/errors.php'); ?>

							<div class="input-group">
								<label>Old password</label>
								<input class="" type="password" placeholder="Old password" name="password_old">
							</div>

							<div class="input-group">
								<label>New password</label>
								<input class="" type="password" placeholder="New password" name="password">
							</div>

							<div class="input-group">
								<label>Verify password</label>
								<input class="" type="password" placeholder="Verify password" name="password_verify">
							</div>

							<div class="text-right">
								<button class="button-md button-primary" type="submit" name="update_pass">Update</button>
							</div>

						</form>
					</div>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
