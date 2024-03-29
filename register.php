<?php
	$pageTitle = 'Register';
	include 'header.php';

	// redirect to index if logged in
	if (isset($_SESSION["my_id"])) {
		header("location: index.php");
	}

	// register script (after header)
	include 'inc/users/register.php';
?>

		<main class="register_page">

			<div class="container">

				<div class="global_panel">

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="input-group">
							<label for="username">Username</label>
							<input class="" type="text" name="username" id="username" placeholder="Username">
						</div>

						<div class="input-group">
							<label for="fname">First name</label>
							<input class="" type="text" name="fname" id="fname" placeholder="First name">
						</div>

						<div class="input-group">
							<label for="lname">Last name</label>
							<input class="" type="text" name="lname" id="lname" placeholder="Last name">
						</div>

						<div class="input-group">
							<label for="email">Email</label>
							<input class="" type="email" name="email" id="email" placeholder="Email">
						</div>

						<div class="input-group">
							<label for="password">Password</label>
							<input class="" type="password" name="password" id="password" placeholder="Password">
						</div>

						<div class="input-group">
							<label for="password_verify">Verify password</label>
							<input class="" type="password" name="password_verify" id="password_verify" placeholder="Verify password">
						</div>

						<div class="text-right">
							<button class="button-md button-primary" type="submit" name="register_user">Register</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
