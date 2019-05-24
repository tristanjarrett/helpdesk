<?php
	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}

  $pageTitle = 'New ticket';
  include 'header.php';
?>

    <main>

			<div class="container">

				<div class="global_panel">

					<h1 class="h3"><?php echo $pageTitle; ?></h1>
					<hr>

					<form action="new-ticket.php" method="POST">

						<?php include('inc/errors.php'); ?>

						<div class="form-group">
							<label>Call type</label>
							<select class="form-control" name="type" value="<?php echo $type; ?>" required>
								<option selected disabled>Please select</option>
								<option value="support">Support Request</option>
								<option value="project">Project</option>
							</select>
						</div>

						<div class="form-group">
							<label>Priority</label>
							<select class="form-control" name="priority" value="<?php echo $priority; ?>" required>
								<option selected disabled>Please select</option>
								<option value="low">Low</option>
								<option value="medium">Medium</option>
								<option value="high">High</option>
							</select>
						</div>

						<div class="form-group">
							<label>Summary</label>
							<input class="form-control" type="text" name="summary" placeholder="Summary" value="<?php echo $summary; ?>" required>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" rows="10" placeholder="Detail your request" required><?php echo $description; ?></textarea>
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" name="create_ticket" value="Submit">Submit</button>
						</div>
					</form>

				</div>

			</div>

    </main>

<?php
  include 'footer.php';
?>
