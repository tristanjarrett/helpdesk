<?php
	$pageTitle = 'Login';
 	include 'header.php';
?>

		<main class="container">

				<h1><?php echo $pageTitle; ?></h1>
				<hr>

				<form action="login.php" method="POST" >
					<?php include('inc/loginerrors.php'); ?>

					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control mb-2" name="username" placeholder="Username">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control mb-2" name="password" placeholder="Password">
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary" name="login_user">Login</button>
					</div>
				</form>

		</main>

<?php include 'footer.php'; ?>
