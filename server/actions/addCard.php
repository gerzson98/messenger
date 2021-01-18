<?php
  session_start();
  include 'D:/Suli/Info/php/messenger/server/functions/chatFunctions.php';

  if (isset($_POST['createChat'])) {
    $othersName = $_POST['targetName'];
    createChat($othersName);
    header("Location: ../../index.php");
    exit;
  }
?>