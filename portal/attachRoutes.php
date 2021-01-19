<?php
  session_start();

  if (isset($_POST['editUser'])) {
    $_SESSION['viewHandler'] = "update";
    header("Location: ../../index.php");
    exit;
  }
  
  if (isset($_POST['logOut'])) {
    $_SESSION['loggedInAs'] = null;
    $_SESSION['viewHandler'] = "logIn";
    header("Location: ../../index.php");
    exit;
  }
  
  if (isset($_POST['openChat'])) {
    $_SESSION['viewHandler'] = "chat";
    $_SESSION['chatId'] = $_POST['chatId'];
    $_SESSION['msgCount'] = 10;
    header("Location: ../../index.php");
    exit;
  }

  if (isset($_POST['back'])) {
    $_SESSION['viewHandler'] = "cards";
    $_SESSION['msgCount'] = 10;
    header("Location: ../../index.php");
    exit;
  }
?>