<?php
	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

	$pageTitle = 'Tickets';
 	include 'header.php';
?>

		<main>

			<div class="container">

				<h1 class="h3"><?php echo $pageTitle; ?></h1>
				<hr>

				<table class="table table-bordered table-striped">

					<thead>
						<tr>
							<th>Summary</th>
							<th>ID</th>
							<th>Call type</th>
							<th>Priority</th>
						</tr>
					</thead>

					<tbody>

					<?php 

					if ($db-> connect_error) {
						die("Connection failed:" . $db->connect_error);
					}

					$tickets_sql = "SELECT id, type, priority, summary from tickets";
					$result_sql = $db-> query($tickets_sql);

					if ($result_sql-> num_rows > 0) {
						while ($row_sql = $result_sql->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row_sql["summary"] . "</td>";
							echo "<td>" . $row_sql["id"] . "</td>";
							echo "<td>" . $row_sql["type"] . "</td>";
							echo "<td>" . $row_sql["priority"] . "</td>";
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
