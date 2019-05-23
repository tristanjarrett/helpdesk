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

		<main>

			<div class="container">

				<h1 class="h3"><?php echo $pageTitle; ?></h1>
				<hr>

				<h2 class="h4">Users</h2>

				<table class="table table-bordered table-striped">

					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
						</tr>
					</thead>

					<tbody>

					<?php 

					if ($db-> connect_error) {
						die("Connection failed:" . $db->connect_error);
					}

					$users_sql = "SELECT username, email, id from users";
					$result_sql = $db-> query($users_sql);

					if ($result_sql-> num_rows > 0) {
						while ($row_sql = $result_sql->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row_sql["username"] . "</td>";
							echo "<td>" . $row_sql["email"] . "</td>";
							echo "</tr>";
						}
					} else {
						
					}
					
					?>

					</tbody>
				</table>

			</div>

		</main>

<?php include 'footer.php'; ?>
