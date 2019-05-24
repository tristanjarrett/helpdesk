<?php
	$pageTitle = 'Register';
 	include 'header.php';
?>

		<main class="register_page">

			<div class="container">

				<div class="global_panel">

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<form action="register.php" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" type="text" name="username" id="username" placeholder="Username">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password" placeholder="Password">
						</div>

						<div class="form-group">
							<label for="password_verify">Verify Password</label>
							<input class="form-control" type="password" name="password_verify" id="password_verify" placeholder="Verify Password">
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="register_user">Register</button>
						</div>

					</form>

				</div>

			</div>
			
		</main>

<?php include 'footer.php'; ?>
