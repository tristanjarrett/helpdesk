<?php
	$pageTitle = 'Register';
 	include 'header.php';
?>

		<main class="register_page">

			<div class="container">

				<div class="global_panel">

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<form action="" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" placeholder="Password" name="password" required>
						</div>

						<div class="form-group">
							<label>Verify Password</label>
							<input class="form-control" type="password" placeholder="Verify Password" name="password_verify" required>
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="register_user">Register</button>
						</div>

					</form>

				</div>

			</div>
			
		</main>

<?php include 'footer.php'; ?>
