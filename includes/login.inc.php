<?php
//checking if signup submit was pressed?
if (isset($_POST['login-submit'])) {
//connecting to database
    require 'dbh.inc.php';
    require 'functions.inc.php';

    $mailuid = mysqli_real_escape_string($conn, $_POST['mailuid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($mailuid) || empty($password)) {
      header("Location: ../login.php?error=emptyfields");
      exit();
    }
    else {
     loginUser($conn, $mailuid, $password);
    }
}
else {
  header("Location: ../index.php");
}
