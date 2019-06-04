<?php

	$pageTitle = 'Login';
	include 'header.php';

	// new ticket script (after header)
	include 'inc/users/login.php';
?>

		<main class="login_page">

			<div class="container-lg">

				<div class="global_panel">

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="">
							<label for="username">Username</label>
							<input class="" name="username" type="text" id="username" placeholder="Username">
						</div>

						<div class="">
							<label for="password">Password</label>
							<input class="" name="password" type="password" id="password" placeholder="Password">
						</div>

						<div class="text-right">
							<button class="button-md button-primary" type="submit" name="login_user">Login</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
