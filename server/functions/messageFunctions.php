<?php

  include 'D:/Suli/Info/php/messenger/server/classes/message.php';

  function getAllMSGById($chatId) {
    $sql = $_SESSION['con'];
    $query = "SELECT * FROM messages ORDER by id DESC WHERE chatId = ".$chatId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "getAllMSGById's query went wrong on DB level.";
      exit;
    } else {
      $messages = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $message = new message($row['chatId'], $row['sentAt'], $row['message'], $row['sentBy']);
        $messages[] = $message;
      }
      $result->free();
      return $messages;
    }
  }

  function getLastMSG($chatId) {
    $sql = $_SESSION['con'];
    $query = "SELECT * FROM messages WHERE chatId = ".$chatId." ORDER by id DESC;";
    $result = $sql->query($query);
    if (!$result) {
      echo "getLastMSG query went wrong at DB level.";
      exit;
    } elseif ($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $result->free();
      $message = new message($row['chatId'], $row['sentAt'], $row['message'], $row['sentBy']);
      return $message;
    } else {
      $message = new message($chatId, "00:00", "No messages yet", $_SESSION['myId']);
      return $message;
    }
  }

  function deleteByChatId($chatId) {
    $sql = $_SESSION['con'];
    $query = "DELETE * FROM messages WHERE chatId = ".$chatId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "Something went wrong at deleteMessages by chatId on DB level.";
      exit;
    } else {
      header("Location: ../../index.php");
      exit;
    }
  }

?>