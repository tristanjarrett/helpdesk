<?php

	// print errors if any
	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo '<div class="alert alert-danger">';
			echo '<span>' . $error . '</span>';
			echo '</div>';
		}
	}