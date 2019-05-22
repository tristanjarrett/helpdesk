<?php
	$pageTitle = 'Register';
 	include 'header.php';
?>

		<main class="container">

				<h1><?php echo $pageTitle; ?></h1>
				<hr>

				<form action="register.php" method="POST">
					<?php include('inc/loginerrors.php'); ?>

					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>

					<div class="form-group">
						<label>Verify Password</label>
						<input type="password" class="form-control" placeholder="Verify Password" name="password_verify">
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary" name="reg_user">Create new</button>
					</div>
				</form>

		</main>

<?php include 'footer.php'; ?>
