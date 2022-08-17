<?php
session_start();
require 'includes/dbh.inc.php';
require "includes/functions.inc.php";

if (isset($_POST['delete_submit'])) {

  unlink(findUserImageName("profile"));
  deletedImageStatusUpdate("status");
  header("Location: profile.php?deleted=success");
} else {
  header("Location: profile.php");
}
if (isset($_POST['delete_submit_back'])) {

  unlink(findUserImageName("profile_back"));
  deletedImageStatusUpdate("status_back");

  header("Location: profile.php?deleted_back=success");
} else {
  header("Location: profile.php");
}
 ?>
