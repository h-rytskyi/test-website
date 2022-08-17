<?php
  require "header.php";
  require "includes/functions.inc.php";
  if (isset($_SESSION['userId'])) {
  } else {
    header("Location: index.php?error=needtologin");
  }
  if (checkProfileImg($_SESSION['status'])) {
    $profileImg = "uploads/profile".$_SESSION['userId'].".jpg";
  }
  else {
    $profileImg = "uploads/default.jpg";
  }
  if (checkProfileImg($_SESSION['status_back'])) {
    $profileImg_back = "uploads/profile_back".$_SESSION['userId'].".jpg";
  }
  else {
    $profileImg_back = "uploads/default_back.jpg";
  }
?>
  <div class="card">
    <div class="card_image">
      <img src="<?php echo $profileImg_back; ?>" alt="back_img">
    </div>
    <div class="profile_image" style="box-shadow: 5px 5px 10px black;">
      <img src="<?php echo $profileImg; ?>" alt="img"><br/>
    </div>
    <div class="card_content">
      <h3><?php echo $_SESSION['userName']; ?></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Duis in nibh dignissim, mattis metus quis, fringilla libero.  Curabitur a fermentum velit. </p>
    </div>
    <div class="icons" style="color:black;">
      <a href="#" class="fab fa-facebook-f" style="color:black;"></a>
      <a href="#" class="fab fa-youtube" style="color:black;"></a>
      <a href="#" class="fab fa-instagram" style="color:black;"></a>
      <a href="#" class="fab fa-twitter" style="color:black;"></a>
      <a href="#" class="fab fa-whatsapp" style="color:black;"></a>
    </div>

      <form class="card_form" action="upload.php" method="post" enctype="multipart/form-data">
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "tooBig") {
              echo "<p class='error'> your image is too big</p>";
            }
            elseif ($_GET['error'] == "uploadError") {
              echo "<p class='error'>Somethig went wrong, try again</p>";
            }
            elseif ($_GET['error'] == "wrongtype") {
              echo "<p class='error'>You can upload only .jpg, and .png</p>";
            }
          }
          if (isset($_GET['profileImg'])) {
            if ($_GET['profileImg'] == 'upload') {
              echo "<p class='success'>Image uploaded</p>";
            }
            if ($_GET['profileImg'] == 'updated') {
              echo "<p class='success'>Image updated</p>";
            }
          }
          ?>
        <label for="fileChose">
            Chose NEW profile image
            <input type="file" name="file" id="fileChose">
          </label><br/><br/>
          <label for="fileChoseBack">
            Chose NEW background
              <input type="file" name="file_back" id="fileChoseBack">
            </label><br/><br/>
          <button type="submit" name="upload_submit">Upload</button>
        </form>
        <?php
        if ($_SESSION['status'] == 1) {
          echo '<form class="card_form" action="delete_profile_image.php" method="post">
            <button type="submit" name="delete_submit">Delete profile image</button>
          </form>';
        }
        if ($_SESSION['status_back'] == 1) {
          echo '<form class="card_form" action="delete_profile_image.php" method="post">
            <button type="submit" name="delete_submit_back">Delete background image</button>
          </form>';
        }
         ?>



    </div>



 <?php
   require "footer.php"
  ?>
