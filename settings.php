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

			<div class="global_panel">

				<div class="container">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="h4 page_title"><?php echo $pageTitle; ?></h1>

					<div class="row">

						<div class="col-md-3">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Users</a>
								<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Create user</a>
							</div>
						</div>

						<div class="col-md-9">
							<div class="tab-content" id="v-pills-tabContent">

								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

									<h2 class="h4 mb-3">Users</h2>

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

									<h3 class="h5 my-3">Techs</h3>
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
											$users_sql = "SELECT * FROM users WHERE user_perm='tech'";
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

									<h3 class="h5 my-3">Users</h3>
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
											$users_sql = "SELECT * FROM users WHERE user_perm='user'";
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

								</div>

								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

									<h2 class="h4 mb-3">Create user</h2>

									<form action="settings.php" method="POST">

										<?php include('inc/errors.php'); ?>

										<div class="form-group">
											<label>User level</label>
											<select class="form-control" type="text" name="user_perm">
												<option value="user" selected>User</option>
												<option value="tech">Tech</option>
												<option value="admin">Admin</option>
											</select>
										</div>

										<div class="form-group">
											<label>Username</label>
											<input class="form-control" type="text" name="username" placeholder="Username">
										</div>

										<div class="form-group">
											<label for="fname">Name</label>
											<input class="form-control" type="text" name="fname" id="fname" placeholder="First name">
										</div>

										<div class="form-group">
											<label for="lname">Surname</label>
											<input class="form-control" type="text" name="lname" id="lname" placeholder="Last name">
										</div>

										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email" name="email" placeholder="Email">
										</div>

										<div class="form-row">
											<div class="form-group col-md">
												<label>Password</label>
												<input class="form-control" type="password" placeholder="Password" name="password">
											</div>

											<div class="form-group col-md">
												<label>Verify password</label>
												<input class="form-control" type="password" placeholder="Verify password" name="password_verify">
											</div>
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

	<?php

	else :
		header("location: index.php");
	endif
	?>

<?php include 'footer.php'; ?>
