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
    header("Location: ../../index.php");
    exit;
  }

  if (isset($_POST['back'])) {
    $_SESSION['viewHandler'] = "cards";
    header("Location: ../../index.php");
    exit;
  }
?>