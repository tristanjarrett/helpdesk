<?php

	$pageTitle = 'Login';
	include 'header.php';

	// new ticket script (after header)
	include 'inc/users/login.php';
?>

		<main class="login_page">

			<div class="container">

				<div class="global_panel">

					<h1 class="h3"><?php echo $pageTitle; ?></h1>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" name="username" type="text" id="username" placeholder="Username">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" name="password" type="password" id="password" placeholder="Password">
						</div>

						<div class="form-group">
					    <input type="checkbox" id="remember" name="remember">
							<label for="remember">Remember me</label>
					  </div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="login_user">Login</button>
						</div>

					</form>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
