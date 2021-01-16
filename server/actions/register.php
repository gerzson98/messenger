<?php
  session_start();
  include '../db/db.php';
  include '../functions/userFunctions.php';

  if (isset($_POST['register'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $pwlen = strlen($password);
    $passwordAgain = $_POST['passwordAgain'];

    if (!isset($userName) || $userName == '') {
      $error = 'Please enter your username!';
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } elseif ($pwlen < 8 || $pwlen > 32) {
      $error = 'Your password have to be 8-32 chars long!';
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } elseif ($password != $passwordAgain) {
      $error = 'Your passwords have to match!';
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } else {
      if (register($userName, $password, $sql)) {
        $_SESSION['viewHandler'] = "registerSucceed";
        header("Location: ../../index.php");
        exit;
      } else {
        $error = 'Sorry, but this username exists already!';
        header("Location: ../../index.php?error=".urlencode($error));
        exit;
      }
    }
  } elseif (isset($_POST['backToLogIn'])) {
    $_SESSION['viewHandler'] = "logIn";
    header("Location: ../../index.php");
    exit;
  }
?>