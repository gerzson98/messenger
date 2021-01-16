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
?>