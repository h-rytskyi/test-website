<?php
  require "header.php";
  require "includes/functions.inc.php";
 ?>
 <style>
 body {
   display:block;
   overflow: auto;
   height: 100%;
 }
  </style>
<div class="container">

  <form class="search_twitt" action="search.inc.php" method="post">
    <h2>Search some twitts</h2>
    <input type="text" name="search_twitt" placeholder="Search twitts.." required>
    <button type="submit" name="search_submit">Search</button>
  </form>
  <h2 style="width:70%;margin:auto;">Post some twits:</h2>
<form class="twit_form" action="includes/twitter.inc.php" method="post">

  <input type="text" class="title_container" name="post_title" placeholder="Title" required>
  <br/>
  <textarea class="twitt_container" name="post_content" placeholder="Enter messege here" required></textarea>
  <button type="submit" name="twitt_submit">Publish</button>
</form>
<h2 style="width:70%;margin:auto;">All twitts:</h2>
<?php
  $sql = "SELECT * FROM twitter;";
  $result = mysqli_query($conn, $sql);
  $checkResult = mysqli_num_rows($result);
  $checkResult--;


  while($checkResult > 0) {
    mysqli_data_seek($result, $checkResult);
    $row = mysqli_fetch_assoc($result);
    echo "<div class='twitts'>";
    echo "<h3 class='title'>".$row['post_title']."</h3>";
    echo "<p class='content'>".$row['post_content']."</p>";
    echo "<p class='author'>".$row['post_author']."</p>";
    echo "<p class='date'>".$row['post_date']."</p>";
    echo "</div>";
    $checkResult--;
  }
 ?>
</div>



   <?php
     require "footer.php";
    ?>
