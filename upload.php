<?php
session_start();
include 'includes/dbh.inc.php';
require 'includes/functions.inc.php';
$id = $_SESSION['userId'];

if (isset($_POST['upload_submit'])) {

if (isset($_FILES['file']) && isset($_FILES['file_back'])) {
  changeProfileImg($_FILES['file']);
  changeProfileImg($_FILES['file_back']);
  exit();
} elseif (isset($_FILES['file'])) {
    changeProfileImg($_FILES['file']);
    exit();
    
} elseif (isset($_FILES['file_back'])) {
    changeProfileImg($_FILES['file_back']);
    exit();
}
/*
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 10000000) {
        $fileNameNew = "profile".$id.".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        //here we put SQL stmt to insert into ing table

        if (checkProfileImg($_SESSION['status'])) {
          header('Location: profile.php?profileImg=updated');
        }
        //got to rereite this into update of status/
        else {
          $sql = "UPDATE profileimg SET status='1' WHERE user_id='$id';";
          mysqli_query($conn, $sql);
          $_SESSION['status'] = 1;
          header('Location: profile.php?profileImg=upload');
        }

        //header('Location: profile.php?upload=success&fileNameNew='.$fileNameNew);
      } else {
        echo "Your file is too big";
      }
    } else {
      echo "error when uploading";
    }
  } else {
    echo "you cannot upload files of this type";
  }
  */

}

 ?>
