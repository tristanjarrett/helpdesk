<?php

  // define database options
  $dbServer = 'localhost';
  $dbUser   = 'root';
  $dbPass   = 'root';
  $dbName   = 'helpdesk';

  // connect to database
  $db = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
