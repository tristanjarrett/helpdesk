<?php

	// print errors if any
	if (count($errors) > 0) {
			foreach ($errors as $error) {
				echo '<div>';
					echo $error;
				echo '</div>';
			}
	}