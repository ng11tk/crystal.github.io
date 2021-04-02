<?php
 if(isset($_POST['signup-submit'])) {

   require 'dbh.inc.php';

   $username = $_POST['uid'];
   $email = $_POST['mail'];
   $password = $_POST['pwd'];
   $repassword = $_POST['re-pwd'];

   if(empty($username) || empty($email) || empty($password) || empty($repassword)) {

     header("Location: ../sign-up.php?error=emptyfields&uid=".$username,"&mail=".$email);
     exit();
   }
   elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/"))) {
     header("Location: ../sign-up.php?error=invalidmails&uid");
     exit();
   }
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: ../sign-up.php?error=invalidmails&uid=".$username);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
     header("Location: ../sign-up.php?error=invaliduid");
     exit();
   }
  elseif ($password !== $repassword) {
    header("Location: ../sign-up.php?error=passwordCheck&uid=".$username,"&mail=".$email);
    exit();
   }
   else {

    $sql = "SELECT uidusers FROM users WHERE uidusers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../sign-up.php?error=sqlerror1");
      exit();
    }
    else {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);

    if($resultCheck > 0)
    {
      header("Location: ../sign-up.php?error=usertaken&mail=".$email);
      exit();
    }
    else{

      $sql = "INSERT INTO users ( uidusers, emailusers, pwdusers) VALUES (?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../sign-up.php?error=sqlerror2");
        exit();
      }
      else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../project.php?signup=success");
        exit();
      }
    }
   }
  }
mysqli_stmt_close($stmt);
mysqli_close($conn);

 }
else {
  header("Location: ../sign-up.php");
  exit();
}
