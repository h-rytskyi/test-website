<?php
function calculator($num1, $num2, $operator) {

  switch ($operator) {
    case "+":
      $sum = $num1 + $num2;
      break;
    case "-":
      $sum = $num1 - $num2;
      break;
    case "*":
      $sum = $num1 * $num2;
      break;
    case "/":
      $sum = $num1 / $num2;
      break;
  }
  return $sum;
}


//function that checks signup input error
//return true if all inputs are valid
function signupInputErrors($user_name, $user_email, $user_pwd, $pwd_repeat) {
  //chek if inputs are not empty
  if (empty($user_name) || empty($user_email) || empty($user_pwd) || empty($pwd_repeat)) {
    header("Location: ../signup.php?error=empty&user_name=".$user_name."&user_email=".$user_email);
    return false;;
  }
  //cheking if neither email and username is valid
  elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
    header("Location: ../signup.php?error=invalidemailuser_name");
    return false;;
  }
  //check email
  elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidemail&user_name=".$user_name."&user_email=".$user_email);
    return false;;
  }
  //cheking if username is valid
  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
    header("Location: ../signup.php?error=invalidusername&user_email=".$user_email);
    return false;;
  }
  //cheking if passwords is mathing
  elseif ($user_pwd !== $pwd_repeat) {
    header("Location: ../signup.php?error=passwordcheck&user_name=".$user_name."&user_email=".$user_email);
    return false;
  }
  else {
    return true;
  }
}

//function that cheks if current user already exist in DB, checks by name and e-mail
//retun true if user exist, and false if it not;
function isUserExists($conn, $user_name, $user_email) {
  $sql = "SELECT * FROM users WHERE user_name=? OR user_email=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();
    return;
  }
  mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_email);
  mysqli_stmt_execute($stmt);
  //changes start
  $resultData = mysqli_stmt_get_result($stmt);
  if ($resultRow = mysqli_fetch_assoc($resultData)) {
    return $resultRow;
  } else {
    $result = false;
    return $result;
  }
}

//login user into site
function loginUser($conn, $user_name, $user_pwd) {
  $isUserExist = isUserExists($conn, $user_name, $user_name);

  if ($isUserExist === false) {
    header("Location: ../login.php?error=nouser");
    exit();
  }
  $pwdHashed = $isUserExist['user_pwd'];
  $checkpassword = password_verify($user_pwd, $pwdHashed);

  if ($checkpassword === false) {
    header("Location: ../login.php?error=wrongpwd&mailuid=".$user_name);
    exit();
  }
  elseif ($checkpassword === true) {
    session_start();
    $_SESSION['userId'] = $isUserExist['user_id'];
    $_SESSION['userName'] = $isUserExist['user_name'];

    //using SQL to add img atributes to superlobal
    $tmp_id = $isUserExist['user_id'];
    $sql = "SELECT * FROM profileimg WHERE user_id='$tmp_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['status'] = $row['status'];
    $_SESSION['status_back'] = $row['status_back'];

    header("Location: ../index.php?login=success");
    exit();
  }
}

//add new user in database;
function addNewUser($conn, $user_name, $user_email, $user_pwd) {
  $sql ="INSERT INTO users (user_name, user_email, user_pwd) VALUES (?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=sqlerror");
    exit();
  }
  $hashedPwd = password_hash($user_pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sss", $user_name, $user_email, $hashedPwd);
  mysqli_stmt_execute($stmt);

  //adding info about user into profileimg table db
  //first must know the id of just added user
  $sql = "SELECT user_id FROM users WHERE user_name='$user_name';";
  $result = mysqli_query($conn, $sql);
  $tmp_row = mysqli_fetch_assoc($result);
  $user_id = $tmp_row['user_id'];
  //second - adding user_id and status to img - default - 0;
  $sql = "INSERT INTO profileimg (user_id, status, status_back) VALUES ('$user_id', '0', '0');";
  mysqli_query($conn, $sql);
}

//takes a string name of var, checks if var is in url response,
//if set then return it`s value from url, else return ''
//use this function in login and signup form,
//users dont need to repeat inputs if they do incorect input in one feild
function dontRepeatInputs($input) {
  if(isset($_GET[$input])) {
    return $_GET[$input];
  } else {
    return;
  }
}
//replace this function without using sql
/*
function checkProfileImg($conn, $user_id) {
  $sql = "SELECT * FROM profileimg WHERE user_id='$user_id';";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['status'] == 1) {
      return true;
    }
    else {
      return false;
      }
  }
  else {
    return false;
  }
} */
function checkProfileImg($status) {
  if($status == 1) {
    return true;
  }
  return false;
}

//function takes three paramaters
//fileinput - defines the name of input of uploading img
//$fileNamePrefix - stands for prefix in resulting name of file
//databaseStatusType - stands for updatind status/statusback
function changeProfileImg($fileInput) {
  $id = $_SESSION['userId'];

  if($fileInput == $_FILES['file']) {
    $file = $fileInput;
    $fileNamePrefix = "profile";
    $status ="status";
    $databaseStatusType = $_SESSION['status'];
  }
  if($fileInput == $_FILES['file_back']) {
    $file = $fileInput;
    $fileNamePrefix = "profile_back";
    $status ="status_back";
    $databaseStatusType = $_SESSION['status_back'];
  }

  $fileName = $fileInput['name'];
  $fileTmpName = $fileInput['tmp_name'];
  $fileSize = $fileInput['size'];
  $fileError = $fileInput['error'];
  $fileType = $fileInput['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 10000000) {
        $fileNameNew = $fileNamePrefix.$id.".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        //here we put SQL stmt to insert into ing table
        if (checkProfileImg($databaseStatusType)) {
          header('Location: profile.php?profileImg=updated');
        }
        //got to rereite this into update of status/
        else {
          $dbServerName = "localhost";
          $dbUserName = "root";
          $dbPassword = "";
          $dbName = "loginsystemcv";

          $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


          $sql = "UPDATE profileimg SET $status='1' WHERE user_id='$id';";
          mysqli_query($conn, $sql);

            if($fileNamePrefix == "profile") {
              $_SESSION['status'] = 1;
            }
            if($fileNamePrefix == "profile_back") {
              $_SESSION['status_back'] = 1;
            }
          header('Location: profile.php?profileImg=upload');
        }

        //header('Location: profile.php?upload=success&fileNameNew='.$fileNameNew);
      } else {
        header("Location: profile.php?error=tooBig");
      }
    } else {
      header("Location: profile.php?error=uploadError");
    }
  } else {
    header("Location: profile.php?error=wrongtype");
  }
}

//func which find out correct extenssion
//uploads may be with different ext. so this func return full name of img with ext and full path to img
//func takes only one par - sting word which show type of img (background|profile)
// id of current user func takes from superglobal session
function findUserImageName($string) {
  $id = $_SESSION['userId'];

  $fileName = "uploads/".$string.$id.".*";
  $fileinfo = glob($fileName);
  $fileExt = explode(".", $fileinfo[0]);
  $fileActualExt = $fileExt[1];

  $file = "uploads/".$string.$id.".".$fileActualExt;

  return $file;
}

//statusType var is for the status/status_back columns of img mysql_list_tables
//$statusGlobalVar - global var _SESSION[status/status_back];
function deletedImageStatusUpdate($statusType) {
  $dbServerName = "localhost";
  $dbUserName = "root";
  $dbPassword = "";
  $dbName = "loginsystemcv";

  $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

  $id = $_SESSION['userId'];
  $sql = "UPDATE profileimg SET $statusType='0' WHERE user_id='$id';";
  mysqli_query($conn, $sql);
  $statusGlobalVar = 0;
  if($statusType == "status") {
    $_SESSION['status'] = 0;
  }
  if($statusType == "status_back") {
    $_SESSION['status_back'] = 0;
  }


}

function dbTableUpdate($tableName, $columnName, $colValue, $colSelector, $selectorValue) {
  $sql = "UPDATE $tableName SET $columnName='$colValue' WHERE $colSelector='$selectorValue';";
  mysqli_query($conn, $sql);
}
?>
