<?php
  require "header.php";
  require 'includes/functions.inc.php';
 ?>

    <div class="center">
      <h1>SignUP</h1>
      <form action="includes/signup.inc.php" method="post">
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "empty") {
              echo "<p class='error'> Fill in all fields</p>";
            }
            elseif ($_GET['error'] == "invalidemailuser_name") {
              echo "<p class='error'>Invalid e-mail and username</p>";
            }
            elseif ($_GET['error'] == "invalidemail") {
              echo "<p class='error'>Invalid e-mail</p>";
            }
            elseif ($_GET['error'] == "passwordcheck") {
              echo "<p class='error'>Your passwords ne spivpadayt`</p>";
            }
            elseif ($_GET['error'] == "sqlerror") {
              echo "<p class='error'>Database issue, try again</p>";
            }
            elseif ($_GET['error'] == "usertaken") {
              echo "<p class='error'>This username already exist, try somethig else</p>";
            }
          }
          elseif ($_GET["signup"] == "success") {
            echo "<p class='success'>Signup successfull</p>";
          }
         ?>
        <div class="txt_field">
          <input type="text" name="user_name" value="<?php echo dontRepeatInputs('user_name');?>">
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="text" name="user_email" value="<?php echo dontRepeatInputs('user_email');?>">
          <span></span>
          <label>E-mail</label>
        </div>
        <div class="txt_field">
          <input type="password" name="user_pwd">
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pwd_repeat">
          <span></span>
          <label>Repeat password</label>
        </div>
        <button class="signup-submit" type="submit" name="signup-submit">SignUP</button>
      </form>
    </div>

  <?php
    require "footer.php"
   ?>
