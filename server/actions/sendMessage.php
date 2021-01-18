<?php
  session_start();
  include 'D:/Suli/Info/php/messenger/server/functions/messageFunctions.php';

  if (isset($_POST['sendMessage'])) {
    $chatId = $_POST['chatId'];
    $message= $_POST['message'];
    $sentBy = $_SESSION['myId'];
    
    date_default_timezone_set("Europe/Budapest");
    $sentAt = date("Y-m-d h:i:s");

    if (!$message || $message == '') {
      $error = "Type in the msg to send!";
      header("Location: ../../index.php?error=".urlencode($error));
      exit;
    } else {
      $message = new message($chatId, $sentAt, $message, $sentBy);
      createMesage($message);
      header("Location: ../../index.php");
      exit;
    }
  }

?>