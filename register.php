<?php
	$pageTitle = 'Register';
 	include 'header.php';
?>

		<main>

			<div class="container mx-auto">

				<form action="register.php" method="POST">
					<?php include('inc/error.php'); ?>

					<div>
						<label>Username</label>
						<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
					</div>

					<div>
						<label>Email</label>
						<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
					</div>

					<div>
						<label>Password</label>
						<input type="password" placeholder="Password" name="password">
					</div>

					<div>
						<label>Verify Password</label>
						<input type="password" placeholder="Verify Password" name="password_verify">
					</div>

					<div>
						<button type="submit" name="reg_user">Create new</button>
					</div>
				</form>

			</div>
			
		</main>

<?php include 'footer.php'; ?>
