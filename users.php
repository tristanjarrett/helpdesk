<?php
	$pageTitle = 'Users';
 	include 'header.php';
?>

		<main>

		<div class="container mx-auto">

			<table>

				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
				</tr>

				<?php 

				if ($db-> connect_error) {
					die("Connection failed:" . $db-> connect_error);
				}

				$users_sql = "SELECT username, email, id from users";
				$result_sql = $db-> query($users_sql);

				if ($result_sql-> num_rows > 0) {
					while ($row_sql = $result_sql-> fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row_sql["id"] . "</td>";
						echo "<td>" . $row_sql["username"] . "</td>";
						echo "<td>" . $row_sql["email"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "0";
				}
				
				?>
			</table>

		</div>

		</main>

<?php include 'footer.php'; ?>
