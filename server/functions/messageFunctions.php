<?php

  include 'D:/Suli/Info/php/messenger/server/classes/message.php';

  function getAllMSGById($chatId) {
    include 'D:/Suli/Info/php/messenger/server/db/db.php';
    $query = "SELECT * FROM messages WHERE chatId = ".$chatId." ORDER BY id ASC;";
    $result = $sql->query($query);
    if (!$result) {
      echo "getAllMSGById's query went wrong on DB level. with query: ".$query;
      exit;
    } else {
      $messages = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $sentAt = substr($row['sentAt'], -8, 5);
        $message = new message($row['chatId'], $sentAt, $row['message'], $row['sentBy']);
        $messages[] = $message;
      }
      $result->free();
      return $messages;
    }
  }

  function getLastSomeMSGById($chatId, $quantity) {
    include 'D:/Suli/Info/php/messenger/server/db/db.php';
    $query = "SELECT * FROM messages WHERE chatId = ".$chatId." ORDER BY id DESC LIMIT ".$quantity.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "getAllMSGById's query went wrong on DB level. with query: ".$query;
      exit;
    } else {
      $messages = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $sentAt = substr($row['sentAt'], -8, 5);
        $message = new message($row['chatId'], $sentAt, $row['message'], $row['sentBy']);
        $messages[] = $message;
      }
      $result->free();
      return $messages;
    }
  }

  function createMesage($msg) {
    include 'D:/Suli/Info/php/messenger/server/db/db.php';
    $query = "INSERT INTO messages (sentBy, chatId, message, sentAt) VALUES (".$msg->sentBy.", ".$msg->chatId.", '".$msg->message."', '".$msg->sentAt."');";
    $result = $sql->query($query);
    if (!$result) {
      echo "createMessage query failed on DB level with query: ".$query;
      exit;
    } else {
      header("Location: ../../index.php");
      exit;
    }
  }

  function getLastMSG($chatId) {
    include 'D:/Suli/Info/php/messenger/server/db/db.php';
    $query = "SELECT * FROM messages WHERE chatId = ".$chatId." ORDER by id DESC;";
    $result = $sql->query($query);
    if (!$result) {
      echo "getLastMSG query went wrong at DB level.";
      exit;
    } elseif ($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $result->free();
      $sentAt = substr($row['sentAt'], -8, 5);
      $message = new message($row['chatId'], $sentAt, $row['message'], $row['sentBy']);
      return $message;
    } else {
      $message = new message($chatId, "00:00", "No messages yet", $_SESSION['myId']);
      return $message;
    }
  }

  function deleteByChatId($chatId) {
    include 'D:/Suli/Info/php/messenger/server/db/db.php';
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