<?php

	// print errors if any
	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo '<div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mb-2" role="alert">';
			echo '<p>' . $error . '</p>';
			echo '</div>';
		}
	}