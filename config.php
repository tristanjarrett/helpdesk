<?php

  // connect database
  require './inc/config/database.php';
  
  $debug_mode = true;

  // debugging
  if ($debug_mode == TRUE) {
    echo '<span style="position: fixed; bottom: 1rem; right: 1rem;">Debug mode (Enabled)</span>';
  } else {
    error_reporting(0);
  }