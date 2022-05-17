<?php
require '_dbconnection.php' ;
session_start();
$_SESSION['firstLogin'] = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $usernameLo = $_POST['user_email'];
  $loginPass = $_POST['loginPass'];
  $inpt_record = "SELECT * FROM users WHERE (user_name = '$usernameLo' OR email = '$usernameLo' ) ";
  $execute = mysqli_query($connecting, $inpt_record);
  $roow = mysqli_num_rows($execute);
  $check_login_pass = mysqli_fetch_assoc($execute);
  
  // echo '<script>alert("$check_login_pass"); debugger; </script>';
  
  $loginhash = password_verify($loginPass, $check_login_pass['password']);
  
  if ($roow == 1) {
    
    if ($loginhash) {
      $_SESSION['$warning']  = false;
      $_SESSION['$warning2']  = false;
      $_SESSION['userInfo'] = "$usernameLo";
      $_SESSION['check'] = true;
      $_SESSION['firstLogin'] = false;
      $_SESSION['use'] = true;
      $_SESSION['userid'] = $check_login_pass['userid'];
      header("location: ../index.php");
    } else {
        $_SESSION['$warning'] = true;
    header("location: ../index.php");
    }
  } else {
    $_SESSION['$warning2'] = true;
    header("location: ../index.php");
  }
}
?>
