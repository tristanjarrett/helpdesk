<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'My Requests';
 	include 'header.php';
?>

			<main>

				<div class="container-lg">

					<div class="global_panel">

						<h1 class="page_title"><?php echo $pageTitle; ?></h1>

						<div class="">
							<table class="table-bordered table-striped">

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

										$id = $row_sql["id"];

										echo "<tr>";
										echo "<td>" . $row_sql["id"] . "</td>";
										echo "<td><a href='ticket.php?id=".$id."'>" . $row_sql["summary"] . "</a></td>";
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
