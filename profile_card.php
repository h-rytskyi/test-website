<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
   <div class="profile_container">
    <div class="card">
      <div class="card_image">
        <img src="uploads/default.jpg" alt="back_img">
      </div>
      <div class="profile_image">
        <img src="<?php echo $profileImg; ?>" alt="img"><br/>
      </div>
      <div class="card_content">
        <h3><?php echo $_SESSION['userName']; ?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Duis in nibh dignissim, mattis metus quis, fringilla libero.  Curabitur a fermentum velit. </p>
      </div>
      <div class="icons">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-youtube"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-whatsapp"></a>
      </div>
      <div class="card_form">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <label for="fileChose">
              Select NEW image
              <input type="file" name="file" id="fileChose">
            </label><br/><br/>
            <button type="submit" name="upload_submit">Upload</button>
          </form>
        </div>
      </div>
    </div>  
  </body>
</html>
