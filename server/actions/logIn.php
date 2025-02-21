<?php
  session_start();
  include '../db/db.php';
  include '../functions/userFunctions.php';
  if (isset($_POST['logIn'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $_SESSION['viewHandler'] = "logIn";
    if (!isset($userName) || $userName == '' || !isset($password) || $password == '') {
      $error = 'Please enter your username and your password!';
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } else {
      if (logIn($userName, $password)) {
        $_SESSION['loggedInAs'] = $userName;
        $_SESSION['myId'] = getUserId($userName);
        $_SESSION['viewHandler'] = "cards";
        header("Location: ../../index.php");
        exit;
      } else {
        $logInError = 'Username or password is incorrect!';
        header("Location: ../../index.php?error=".urlencode($logInError));
        exit;
      }
    }
  }
  
  if (isset($_POST['register'])) {
    $_SESSION['viewHandler'] = "register";
    header("Location: ../../index.php");
    exit;
  }
?>