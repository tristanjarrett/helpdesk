<?php

  // define database options
  $dbServer = 'localhost';
  $dbUser   = 'root';
  $dbPass   = '';
  $dbName   = 'helpdesk';

  // connect to database
  $db = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
