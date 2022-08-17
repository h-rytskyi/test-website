<?php
  require "header.php";
  require 'includes/functions.inc.php';
 ?>

<div class="center">
  <h1>login</h1>
  <form action="includes/login.inc.php" method="post">
    <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
          echo "<p class='error'> Fill in all fields</p>";
        }
        elseif ($_GET['error'] == "sqlerror") {
          echo "<p class='error'>Database issue</p>";
        }
        elseif ($_GET['error'] == "wrongpwd") {
          echo "<p class='error'>Wrong password</p>";
        }
        elseif ($_GET['error'] == "nouser") {
          echo "<p class='error'>This user is not registered</p>";
        }
      }
      ?>
    <div class="txt_field">
      <input type="text" name="mailuid" value="<?php echo dontRepeatInputs('mailuid');?>">
      <span></span>
      <label>Username/E-mail...</label>
    </div>
    <div class="txt_field">
      <input type="password" name="password">
      <span></span>
      <label>Password</label>
    </div>
    <div class="pass"> Forgot Password?</div>
    <button class="login-submit" type="submit" name="login-submit">Login</button>
    <div class="signup-link">
      Not registered? <a href="signup.php?signup">SignUP</a>
    </div>

  </form>
</div>




<?php
  require "footer.php"
 ?>
