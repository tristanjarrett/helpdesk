<?php

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo '<span style="color: red; display: block;">' . $error . '</span>';
		}
	}
