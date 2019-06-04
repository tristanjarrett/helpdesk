<?php
	$pageTitle = 'Register';
	include 'header.php';

	// register script (after header)
	include 'inc/users/register.php';
?>

		<main class="register_page">

			<div class="container">

				<div class="global_panel">

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="">
							<label for="username">Username</label>
							<input class="" type="text" name="username" id="username" placeholder="Username">
						</div>

						<div class="">
							<label for="fname">First name</label>
							<input class="" type="text" name="fname" id="fname" placeholder="First name">
						</div>

						<div class="">
							<label for="lname">Last name</label>
							<input class="" type="text" name="lname" id="lname" placeholder="Last name">
						</div>

						<div class="">
							<label for="email">Email</label>
							<input class="" type="email" name="email" id="email" placeholder="Email">
						</div>

						<div class="">
							<label for="password">Password</label>
							<input class="" type="password" name="password" id="password" placeholder="Password">
						</div>

						<div class="">
							<label for="password_verify">Verify Password</label>
							<input class="" type="password" name="password_verify" id="password_verify" placeholder="Verify Password">
						</div>

						<div class="text-right">
							<button class="button-md button-primary" type="submit" name="register_user">Register</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
