<?php
if(isset($_POST['login-submit']))
{
    require 'dbh.inc.php';
    $mailuid  = $_POST['mailuid'];
    $password  = $_POST['password'];

    if(empty($mailuid) || empty($password))
    {
      header("Location: ../index.php?error=emptyfields");
      exit();
    }
    else 
    {
        $sql = "SELECT * FROM users WHERE uidusers=? OR pwdusers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row= mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($password, $row['pwdusers']);
                if($pwdcheck == false)
                {
                    header("Location: ../index.php?error=worngpwd");
                    exit();
                } 
                elseif ($pwdcheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['idusers'];
                    $_SESSION['userUid'] = $row['uidusers'];
                    header("Location: ../front1.php?Login=success");
                    exit();
                }
                else 
                {
                    header("Location: ../index.php?error=worngpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../sign-up?error=nouser.php");
                exit(); 
            }
        }
    }
}
else {
  header("Location: ../sign-up.php");
  exit();
}
