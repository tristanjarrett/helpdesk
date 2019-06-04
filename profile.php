<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'Profile';
	include 'header.php';

	// edit user script (after header)
	include 'inc/users/update.php';
?>

		<main>

			<div class="container-lg">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<div class="tab-menu">
					  <button class="tab-link" onclick="openTab(event, 'details')" id="defaultOpen">Details</button>
					  <button class="tab-link" onclick="openTab(event, 'password')">Password</button>
					</div>

					<div id="details" class="tab-content">
						<h2>Edit details</h2>

						<form action="" method="POST">

							<?php include('inc/errors.php'); ?>

							<div class="">
								<label>Username</label>
								<input class="" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['my_username']; ?>">
							</div>

							<div class="">
								<label>Name</label>
								<input class="" type="text" name="fname" placeholder="Name" value="<?php echo $_SESSION['my_fname']; ?>">
							</div>

							<div class="">
								<label>Surname</label>
								<input class="" type="text" name="lname" placeholder="Surname" value="<?php echo $_SESSION['my_lname']; ?>">
							</div>

							<div class="">
								<label>Email</label>
								<input class="" type="text" name="email" placeholder="Email" value="<?php echo $_SESSION['my_email']; ?>">
							</div>

							<div class="text-right">
								<button class="button-md button-primary" type="submit" name="update_user">Update</button>
							</div>

						</form>
					</div>

					<div id="password" class="tab-content">
						<h2>Change password</h2>

						<form action="" method="POST">

							<?php include('inc/errors.php'); ?>

							<div class="">
								<label>Old password</label>
								<input class="" type="password" placeholder="Old password" name="password_old">
							</div>

							<div class="form-row">
								<div class=" col-md">
									<label>New password</label>
									<input class="" type="password" placeholder="New password" name="password">
								</div>

								<div class=" col-md">
									<label>Verify password</label>
									<input class="" type="password" placeholder="Verify password" name="password_verify">
								</div>
							</div>

							<div class="text-right">
								<button class="button-md button-primary" type="submit" name="update_pass">Update</button>
							</div>

						</form>
					</div>

					<script>
					function openTab(evt, tabId) {
					  var i, tabContent, tabLinks;
					  tabContent = document.getElementsByClassName("tab-content");
					  for (i = 0; i < tabContent.length; i++) {
					    tabContent[i].style.display = "none";
					  }
					  tabLinks = document.getElementsByClassName("tab-button");
					  for (i = 0; i < tabLinks.length; i++) {
					    tabLinks[i].className = tabLinks[i].className.replace(" active", "");
					  }
					  document.getElementById(tabId).style.display = "block";
					  evt.currentTarget.className += " active";
					}

					document.getElementById("defaultOpen").click();
					</script>

				</div>

			</div>

		</main>

<?php include 'footer.php'; ?>
