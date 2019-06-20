<?php

	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['my_id'])) {
		header("location: login.php");
	}

	$pageTitle = 'Ticket';
 	include 'header.php';
?>

			<main class="container-lg">

					<div class="global_panel">

						<?php if (isset($_GET['id'])) {

							$id = $_GET['id'];

							$sql = "SELECT * FROM tickets WHERE id='".$id."'";
							$result = $db-> query($sql);
							if ($result-> num_rows > 0) {
								while ($row = $result->fetch_assoc()) {

									// get Name by ID
									$user_id = $row['logged_by'];
									$logged_by_user_id = "";

									$name_sql = "SELECT fname, lname, email FROM users WHERE id='".$user_id."'";
									$return_sql = $db-> query($name_sql);
									if ($return_sql-> num_rows > 0) {
										while ($id_sql = $return_sql->fetch_assoc()) {

											if ($id_sql['fname'] && $id_sql['lname'] != null) {
												$logged_by_user_id = $id_sql['fname'] . " " . $id_sql['lname'];
											} else {
												$logged_by_user_id = $id_sql['email'];
											}

										}
									} else {
										$logged_by_user_id = '<span style="color: red;">User deleted</span>';
									}
									// end get Name by ID

									?>

									<h1 class="page_title"><?php echo $row["summary"]; ?></h1>

									<ul>
										<li>Type: <?php echo $row["type"]; ?></li>
										<li>Priority: <?php echo $row["priority"]; ?></li>
										<li>Logged by <?php echo $logged_by_user_id; ?> on <?php echo $row["timestamp"]; ?></li>
									</ul>

									<hr>
									<p><?php echo $row["description"]; ?></p>



							<?php
								}
							} else {

							}

						} ?>

					</div>

			</main>

<?php include 'footer.php'; ?>
