<?php
  require "header.php";
  require "includes/functions.inc.php";

$date = $_GET['datetime'];
$datetime = str_replace("%", " ", $date);

$sql = "SELECT * FROM twitter WHERE post_date = '$datetime';";
$result = mysqli_query($conn, $sql);
echo "<div class='container'>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='twitts'>";
  echo "<h3 class='title'>".$row['post_title']."</h3>";
  echo "<p class='content'>".$row['post_content']."</p>";
  echo "<p class='author'>".$row['post_author']."</p>";
  echo "<p class='date'>".$row['post_date']."</p>";
  echo "</div>";
}
echo "</div>";



   require "footer.php";
  ?>
