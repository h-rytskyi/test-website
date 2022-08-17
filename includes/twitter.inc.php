<?php
session_start();
require 'dbh.inc.php';
require 'functions.inc.php';

if (isset($_POST['twitt_submit'])) {
  $post_title = $_POST['post_title'];
  $post_content = $_POST['post_content'];
  $post_author = $_SESSION['userName'];
  $datetime = date('Y-m-d H:i:s');
  $sql = "INSERT INTO twitter (post_title, post_content, post_author, post_date)
  VALUES ('$post_title', '$post_content', '$post_author', '$datetime');";
  mysqli_query($conn, $sql);

  header("Location: ../twitter.php?twitter=success");
} else {
  header("Location: ../index.php");
}
 ?>
