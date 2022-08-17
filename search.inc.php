<?php
require "header.php";
require 'includes/dbh.inc.php';
require 'includes/functions.inc.php';
?>
<style>
body {
  display:block;
  overflow: auto;
  height: 100%;
}
</style>
<?php
if (isset($_POST['search_submit'])) {
  $search = $_POST['search_twitt'];

  $sql = "SELECT * FROM twitter WHERE post_title LIKE '%$search%'
  OR post_content LIKE '%$search%' OR post_author LIKE '%$search%'
  OR post_date LIKE '%$search%';";
  $result = mysqli_query($conn, $sql);

  $checkResult = mysqli_num_rows($result);
  echo "<div class='container'>";
  echo "<h3 style='width:70%;margin:auto;margin-top:100px;'>There are ".$checkResult." twitts</h3>";

  if ($checkResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<a href='twitt_page.php?datetime=".$row['post_date']."' style='color:black;'><div class='twitts'>";
      echo "<h3 class='title'>".$row['post_title']."</h3>";
      echo "<p class='content'>".$row['post_content']."</p>";
      echo "<p class='author'>".$row['post_author']."</p>";
      echo "<p class='date'>".$row['post_date']."</p>";
      echo "</div></a>";
    }
  }
  echo "</div>";
} else {
  header("Location: index.php");
}

require "footer.php";
?>
