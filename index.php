<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'Dashboard';
 	include 'header.php';
?>

		<?php if ($_SESSION['my_user_perm'] == 'admin' || $_SESSION['my_user_perm'] == 'tech' ) : ?>
			<main>

				<div class="container">

					<div class="global_panel">

						<h1 class="h3"><?php echo $pageTitle; ?></h1>
						<hr>

						<div class="table-responsive">
							<table class="table table-bordered table-striped">

								<thead>
									<tr>
										<th>ID</th>
										<th>Summary</th>
										<th>Call type</th>
										<th>Logged by</th>
										<th>Priority</th>
										<th>Date</th>
									</tr>
								</thead>

								<tbody>

								<?php

								if ($db->connect_error) {
									die("Connection failed:" . $db->connect_error);
								}

								$tickets_sql = "SELECT * FROM tickets";
								$result_sql = $db-> query($tickets_sql);
								if ($result_sql-> num_rows > 0) {
									while ($row_sql = $result_sql->fetch_assoc()) {

										$user_id = $row_sql['logged_by'];

										// get Name by ID
										$name_sql = "SELECT * FROM users WHERE id='".$user_id."'";
										$return_sql = $db-> query($name_sql);
										if ($return_sql-> num_rows > 0) {
											while ($id_sql = $return_sql->fetch_assoc()) {
												$logged_by_user_id = $id_sql['fname'] . " " . $id_sql['lname'];
											}
										}
										// end get Name by ID

										echo "<tr>";
										echo "<td>" . $row_sql["id"] . "</td>";
										echo "<td>" . $row_sql["summary"] . "</td>";
										echo "<td>" . $row_sql["type"] . "</td>";
										echo "<td>" . $logged_by_user_id . "</td>";
										echo "<td>" . $row_sql["priority"] . "</td>";
										echo "<td>" . $row_sql["timestamp"] . "</td>";
										echo "</tr>";
									}
								}

								?>

								</tbody>
							</table>
						</div>

					</div>

				</div>

			</main>

			<?php
			else :

				header("location: new-ticket.php");

			endif
			?>


<?php include 'footer.php'; ?>
