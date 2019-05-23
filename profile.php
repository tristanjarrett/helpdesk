<?php
	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

	$pageTitle = 'Profile';
 	include 'header.php';
?>

		<main>

			<div class="container">

				<h1 class="h3"><?php echo $pageTitle; ?></h1>
				<hr>

				

			</div>

		</main>

<?php include 'footer.php'; ?>
