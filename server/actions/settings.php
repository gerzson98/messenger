<?php
  include '../db/db.php';
  include '../db/dbFunctions.php';

  if (isset($_POST['update'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $pwlen = strlen($password);

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
      if ($_SESSION['loggedInAs'] != $userName) {
        if (validateUserName($userName, $sql)) {
          if (!updateUser($userName, $password, $sql)) {
            $error = "Something went wrong at updateUser";
            header("Location: ../../index.php?error=" .urlencode($error));
            exit;
          } else {
            header("Location: ../../index.php");
            exit;
          }
        } else {
          $error = "This username already exists.";
          header("Location: ../../index.php?error=" .urlencode($error));
          exit;
        }
      } else {
        if (!updateUser($userName, $password, $sql)) {
          $error = "Something went wrong at updateUser";
          header("Location: ../../index.php?error=" .urlencode($error));
          exit;
        } else {
          $_SESSION['viewHandler'] = "updateSucceed";
          header("Location: ../../index.php");
          exit;
        }
      }
    }
  }
  
  if (isset($_POST['back'])) {
    $_SESSION['viewHandler'] = "cards";
    header("Location: ../../index.php");
    exit;
  }
?>
