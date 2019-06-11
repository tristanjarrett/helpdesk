<?php

  // Display logged in users full name or email if name = null
  function displayName() {

    // call the database variable
    global $db;

    $sql = "SELECT * from users WHERE id='".$_SESSION['my_id']."'";
    $result = $db-> query($sql);

    if ($result-> num_rows > 0) {
      while ($user = $result->fetch_assoc()) {

        if ($user['fname'] && $user['lname'] != null) {
          echo $user['fname'] . " " . $user['lname'];
        } else {
          echo $user['email'];
        }

      }
    }

  }
