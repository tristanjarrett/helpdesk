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

			<div class="container mx-auto">

        <!-- logged in user information -->
    		<?php if (isset($_SESSION['username'])) : ?>

				<h1><?php echo $pageTitle; ?></h1>
        <hr>

				<form method="post">
					<?php echo $alert; ?>

					<div>
						<label>Account</label>
						<input type="text" name="account" placeholder="Account" value="<?php echo $account; ?>">
					</div>

					<div>
						<label>Call type</label>
            <select name="type" value="<?php echo $type; ?>">
              <option selected disabled>Please select</option>
              <option value="support">Support Request</option>
              <option value="project">Project</option>
            </select>
					</div>

          <div>
						<label>Priority</label>
            <select name="priority" value="<?php echo $priority; ?>">
              <option selected disabled>Please select</option>
              <option value="low">Low</option>
              <option value="medium">Medium</option>
              <option value="high">High</option>
            </select>
					</div>

          <div>
						<label>Summary</label>
						<input type="text" name="summary" placeholder="Summary" value="<?php echo $summary; ?>">
					</div>

					<div>
						<label>Description</label>
						<textarea name="description" rows="10" placeholder="Detail your request"><?php echo $description; ?></textarea>
					</div>

					<div>
						<button type="submit" name="submit" value="Submit">Submit</button>
					</div>
				</form>

    		<?php endif ?>

			</div>

    </main>

<?php
  include 'footer.php';
?>
