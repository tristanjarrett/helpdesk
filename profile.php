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

			<div class="global_panel">

				<div class="container">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="h4 page_title"><?php echo $pageTitle; ?></h1>

					<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Details</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
						</li>
					</ul>

					<div class="tab-content" id="myTabContent">

						<div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">

							<form action="" method="POST">

								<?php include('inc/errors.php'); ?>

								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['my_username']; ?>">
								</div>

								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="fname" placeholder="Name" value="<?php echo $_SESSION['my_fname']; ?>">
								</div>

								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" type="text" name="lname" placeholder="Surname" value="<?php echo $_SESSION['my_lname']; ?>">
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
									<label>Old password</label>
									<input class="form-control" type="password" placeholder="Old password" name="password_old">
								</div>

								<div class="form-row">
									<div class="form-group col-md">
										<label>New password</label>
										<input class="form-control" type="password" placeholder="New password" name="password">
									</div>

									<div class="form-group col-md">
										<label>Verify password</label>
										<input class="form-control" type="password" placeholder="Verify password" name="password_verify">
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
