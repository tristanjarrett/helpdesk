<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'My tickets';
 	include 'header.php';
?>

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
										<th>Priority</th>
										<th>Date logged</th>
									</tr>
								</thead>

								<tbody>

								<?php

								if ($db->connect_error) {
									die("Connection failed:" . $db->connect_error);
								}

								$tickets_sql = "SELECT * FROM tickets WHERE logged_by='".$_SESSION['my_id']."'";
								$result_sql = $db-> query($tickets_sql);
								if ($result_sql-> num_rows > 0) {
									while ($row_sql = $result_sql->fetch_assoc()) {

										echo "<tr>";
										echo "<td>" . $row_sql["id"] . "</td>";
										echo "<td>" . $row_sql["summary"] . "</td>";
										echo "<td>" . $row_sql["type"] . "</td>";
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


<?php include 'footer.php'; ?>
