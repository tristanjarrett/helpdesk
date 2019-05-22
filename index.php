<?php
	if(!isset($_SESSION)) {
  	session_start();
  }

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		//echo $_SESSION['msg'];
		header("location: login.php");
	}

  $pageTitle = 'New ticket';
  include 'header.php';
?>

    <main class="container">

        <!-- logged in user information -->
    		<?php if (isset($_SESSION['username'])) : ?>

				<h4><?php echo $pageTitle; ?></h4>
        <hr class="mb-4">

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
            </select>
					</div>

          <div>
						<label>Priority</label>
            <select name="priority" value="<?php echo $priority; ?>">
              <option selected disabled>Please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
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

    </main>

<?php
  include 'footer.php';
?>
