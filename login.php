<?php
	$pageTitle = 'Login';
 	include 'header.php';
?>

		<main class="container mx-auto py-24">

				<div class="w-full max-w-md mx-auto">
					<form action="login.php" method="POST" class="bg-white shadow-md px-8 pt-6 pb-8">
					
						<?php include('inc/error.php'); ?>

						<div class="mb-4">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="text" id="username" placeholder="Username">
						</div>

						<div class="mb-6">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" id="password" placeholder="**********">
						</div>

						<div class="flex items-center justify-between">
							<button class="bg-blue-500 hover:bg-blue-700 text-white rounded font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit" name="login_user">Login</button>
							<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">Forgot Password?</a>
						</div>

					</form>
				</div>

		</main>

<?php include 'footer.php'; ?>
