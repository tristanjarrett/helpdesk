<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'Settings';
 	include 'header.php';

	// new user script (after header)
	include 'inc/users/create.php';
?>

	<?php if ($_SESSION['my_user_perm'] == 'admin') : ?>
		<main>

			<div class="container-lg">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<h3 class="h5 my-3">Admins</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Surname</th>
									<th>Username</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if ($db-> connect_error) {
								die("Connection failed:" . $db->connect_error);
							}
							$users_sql = "SELECT * FROM users WHERE user_perm='admin'";
							$result_sql = $db-> query($users_sql);
							if ($result_sql-> num_rows > 0) {
								while ($row_sql = $result_sql->fetch_assoc()) { ?>
									<tr>
										<td><?php echo $row_sql["fname"]; ?></td>
										<td><?php echo $row_sql["lname"]; ?></td>
										<td><?php echo $row_sql["username"]; ?></td>
										<td><?php echo $row_sql["email"]; ?></td>
										<td><a href="settings.php?delete=<?php echo $row_sql['id']; ?>" style="color: red;">Delete</a></td>
									</tr>
									<?php
								}
							} else {

							}
							?>
							</tbody>
						</table>
					</div>

					<h2 class="h4 mb-3">Create user</h2>

					<form action="settings.php" method="POST">

					  <?php include('inc/errors.php'); ?>

					  <div class="">
					    <label>User level</label>
					    <select class="" type="text" name="user_perm">
					      <option value="user" selected>User</option>
					      <option value="tech">Tech</option>
					      <option value="admin">Admin</option>
					    </select>
					  </div>

					  <div class="">
					    <label>Username</label>
					    <input class="" type="text" name="username" placeholder="Username">
					  </div>

					  <div class="">
					    <label for="fname">Name</label>
					    <input class="" type="text" name="fname" id="fname" placeholder="First name">
					  </div>

					  <div class="">
					    <label for="lname">Surname</label>
					    <input class="" type="text" name="lname" id="lname" placeholder="Last name">
					  </div>

					  <div class="">
					    <label>Email</label>
					    <input class="" type="email" name="email" placeholder="Email">
					  </div>

					  <div class="">
					    <label>Password</label>
					    <input class="" type="password" placeholder="Password" name="password">
					  </div>

					  <div class="">
					    <label>Verify password</label>
					    <input class="" type="password" placeholder="Verify password" name="password_verify">
					  </div>

					  <div class="text-right">
					    <button class="button-md button-primary" type="submit" name="create_user">Create user</button>
					  </div>

					</form>

				</div>

			</div>

		</main>

	<?php

	else :
		header("location: index.php");
	endif
	?>

<?php include 'footer.php'; ?>
