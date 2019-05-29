<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
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

					<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
						</li>
					</ul>

					<div class="tab-content" id="myTabContent">

						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

							<ul class="list_unstyled">
								<li>Username: <strong><?php echo $_SESSION['my_username']; ?></strong></li>
								<li>Name: <strong><?php echo $_SESSION['my_fname']; ?></strong></li>
								<li>Surname: <strong><?php echo $_SESSION['my_lname']; ?></strong></li>
								<li>Email: <strong><?php echo $_SESSION['my_email']; ?></strong></li>
							</ul>

						</div>

						<div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">

							<form action="" method="POST">

								<?php include('inc/errors.php'); ?>

								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="fname" placeholder="First Name" value="<?php echo $_SESSION['my_fname']; ?>">
								</div>

								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['my_lname']; ?>">
								</div>

								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $_SESSION['my_email']; ?>">
								</div>

								<div class="text-right">
									<button class="btn btn-primary" type="submit" name="update_user">Update</button>
								</div>

							</form>

						</div>

						<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

							<form action="" method="POST">

								<?php include('inc/errors.php'); ?>

								<div class="form-group">
									<label>Old Password</label>
									<input class="form-control" type="password" placeholder="Old Password" name="password_old">
								</div>

								<div class="form-row form-group">
									<div class="col-md">
										<label>New Password</label>
										<input class="form-control" type="password" placeholder="New Password" name="password">
									</div>

									<div class="col-md">
										<label>Verify Password</label>
										<input class="form-control" type="password" placeholder="Verify Password" name="password_verify">
									</div>
								</div>

								<div class="text-right">
									<button class="btn btn-primary" type="submit" name="update_pass">Update</button>
								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
