<?php
//checking if signup submit was pressed?
if (isset($_POST['signup-submit'])) {
//connecting to database
    require 'dbh.inc.php';
    require 'functions.inc.php';
//getting the variables from user input with string escape
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_pwd = mysqli_real_escape_string($conn, $_POST['user_pwd']);
    $pwd_repeat = mysqli_real_escape_string($conn, $_POST['pwd_repeat']);

    if(signupInputErrors($user_name, $user_email, $user_pwd, $pwd_repeat)) {

      if (isUserExists($conn, $user_name, $user_email)) {
        header("Location: ../signup.php?error=usertaken&user_email=".$user_email);
        exit();
      }
      else {
        addNewUser($conn, $user_name, $user_email, $user_pwd);
        header("Location: ../signup.php?signup=success");
        exit();
        }
      }
}
else {
  header("Location: ../signup.php");
}
 ?>
