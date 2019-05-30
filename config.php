<?php

  // dev options
  $debug_mode = true;

  // connect database
  require './inc/config/database.php';

  // debugging
  if ($debug_mode == TRUE) {
    echo '<span style="position: fixed; bottom: 1rem; right: 1rem;">Debug mode (Enabled)</span>';
  } else {
    error_reporting(0);
  }
