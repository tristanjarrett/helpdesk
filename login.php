<?php
	$pageTitle = 'Login';
 	include 'header.php';
?>

		<main class="login_page">

			<div class="container">

				<h1 class="h3"><?php echo $pageTitle; ?></h1>
				<hr>

					<form action="" method="POST">
					
						<?php include('inc/error.php'); ?>

						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" name="username" type="text" id="username" placeholder="Username" required>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="login_user">Login</button>
						</div>

					</form>

			</div>

		</main>

<?php include 'footer.php'; ?>
