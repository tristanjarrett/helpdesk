<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	include 'inc/users/create.php';
	
	$pageTitle = 'Settings';
 	include 'header.php';

?>

	<?php if ($_SESSION['my_user_perm'] == 'admin') : ?>
		<main>

			<div class="container-lg">

				<div class="global_panel">

					<?php echo $_SESSION['success']; ?>
					<?php echo $_SESSION['error']; ?>

					<h1 class="page_title"><?php echo $pageTitle; ?></h1>

					<div class="tab-menu">
					  <button class="tab-link" onclick="openTab(event, 'users')" id="defaultOpen">Users</button><!--
					--><button class="tab-link" onclick="openTab(event, 'new-user')">New user</button>
					</div>

					<div id="users" class="tab-content">
						<h2>Users</h2>

						<div class="">
							<table class="table-bordered table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Surname</th>
										<th>Username</th>
										<th>Email</th>
										<th>User level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if ($db-> connect_error) {
									die("Connection failed:" . $db->connect_error);
								}
								$users_sql = "SELECT * FROM users";
								$result_sql = $db-> query($users_sql);
								if ($result_sql-> num_rows > 0) {
									while ($row_sql = $result_sql->fetch_assoc()) {

										// disable delete button if self
										if ($_SESSION['my_id'] == $row_sql['id']) {
											$del_not_self = '<span style="color: #999;">Delete</span>';
										} else {
											$id = $row_sql['id'];
											$del_not_self = '<a href="settings.php?delete='.$id.'" style="color: red;">Delete</a>';
										}

										?>
										<tr>
											<td><?php echo $row_sql["fname"]; ?></td>
											<td><?php echo $row_sql["lname"]; ?></td>
											<td><?php echo $row_sql["username"]; ?></td>
											<td><?php echo $row_sql["email"]; ?></td>
											<td><?php echo $row_sql["user_perm"]; ?></td>
											<td><?php echo $del_not_self; ?></td>
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

					<div id="new-user" class="tab-content">
						<h2>New user</h2>

						<form action="settings.php" method="POST">

						  <?php include('inc/errors.php'); ?>

						  <div class="input-group">
						    <label>User level</label>
						    <select class="" type="text" name="user_perm">
						      <option value="user" selected>User</option>
						      <option value="tech">Tech</option>
						      <option value="admin">Admin</option>
						    </select>
						  </div>

						  <div class="input-group">
						    <label>Username</label>
						    <input class="" type="text" name="username" placeholder="Username">
						  </div>

						  <div class="input-group">
						    <label for="fname">Name</label>
						    <input class="" type="text" name="fname" id="fname" placeholder="First name">
						  </div>

						  <div class="input-group">
						    <label for="lname">Surname</label>
						    <input class="" type="text" name="lname" id="lname" placeholder="Last name">
						  </div>

						  <div class="input-group">
						    <label>Email</label>
						    <input class="" type="email" name="email" placeholder="Email">
						  </div>

						  <div class="input-group">
						    <label>Password</label>
						    <input class="" type="password" placeholder="Password" name="password">
						  </div>

						  <div class="input-group">
						    <label>Verify password</label>
						    <input class="" type="password" placeholder="Verify password" name="password_verify">
						  </div>

						  <div class="text-right">
						    <button class="button-md button-primary" type="submit" name="create_user">Create user</button>
						  </div>

						</form>
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
