<?php
	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

	$pageTitle = 'Settings';
 	include 'header.php';
?>


	<?php if ($_SESSION['username'] == 'tristan') : ?>
		<main>

			<div class="container">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<div class="row">

						<div class="col-3">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Users</a>
								<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Create user</a>
							</div>
						</div>

						<div class="col-9">
							<div class="tab-content" id="v-pills-tabContent">

								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

									<h2 class="h4 mb-4">Users</h2>
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Name</th>
												<th>Surname</th>
												<th>Username</th>
												<th>Email</th>
												<th>User Level</th>
											</tr>
										</thead>
										<tbody>
										<?php
										if ($db-> connect_error) {
											die("Connection failed:" . $db->connect_error);
										}
										$users_sql = "SELECT fname, lname, username, email, user_perm from users";
										$result_sql = $db-> query($users_sql);
										if ($result_sql-> num_rows > 0) {
											while ($row_sql = $result_sql->fetch_assoc()) {
												echo "<tr>";
												echo "<td>" . $row_sql["fname"] . "</td>";
												echo "<td>" . $row_sql["lname"] . "</td>";
												echo "<td>" . $row_sql["username"] . "</td>";
												echo "<td>" . $row_sql["email"] . "</td>";
												echo "<td>" . $row_sql["user_perm"] . "</td>";
												echo "</tr>";
											}
										} else {

										}
										?>
										</tbody>
									</table>
									</div>

								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

									<h2 class="h4 mb-4">Create user</h2>
									<form action="settings.php" method="POST">

										<?php include('inc/errors.php'); ?>

										<div class="form-group">
											<label>User level</label>
											<select class="form-control" type="text" name="user_perm">
												<option value="user" selected>User</option>
												<option value="admin">Admin</option>
											</select>
										</div>

										<div class="form-group">
											<label>Username</label>
											<input class="form-control" type="text" name="username" placeholder="Username">
										</div>

										<div class="form-row">
											<div class="col">
												<label for="fname">First name</label>
												<input class="form-control" type="text" name="fname" id="fname" placeholder="First name">
											</div>

											<div class="col">
												<label for="lname">Last name</label>
												<input class="form-control" type="text" name="lname" id="lname" placeholder="Last name">
											</div>
										</div>

										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email" name="email" placeholder="Email">
										</div>

										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" placeholder="Password" name="password">
										</div>

										<div class="form-group">
											<label>Verify Password</label>
											<input class="form-control" type="password" placeholder="Verify Password" name="password_verify">
										</div>

										<div class="text-right">
											<button class="btn btn-primary" type="submit" name="create_user">Create user</button>
										</div>

									</form>

								</div>
							</div>
						</div>

					</div>

				</div>

			</div>

		</main>

	<?php else : ?>
		<main>
			<div class="container">
				<div class="global_panel">
					Access denied, please log in with admin
				</div>
			</div>
		</main>
	<?php endif ?>

<?php include 'footer.php'; ?>
