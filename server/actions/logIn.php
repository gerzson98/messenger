<?php
  session_start();
  include '../db/db.php';
  include '../db/dbFunctions.php';
  //date_default_timezone_set('Europe/Budapest');
  if (isset($_POST['logIn'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    // $time = date('Y-m-d h:i:s');
    if (!isset($userName) || $userName == '' || !isset($password) || $password == '') {
      $error = 'Please enter your username and your password!';
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } else {
      if (logIn($userName, $password, $sql)) {
        $_SESSION['loggedInAs'] = $userName;
        header("Location: ../../index.php");
        exit;
      } else {
        $logInError = 'Username or password is incorrect!';
        header("Location: ../../index.php?error=".urlencode($logInError));
        exit;
      }
    }
  } elseif (isset($_POST['register'])) {
    $_SESSION['viewHandler'] = "register";
    header("Location: ../../index.php");
    exit;
  }
?>