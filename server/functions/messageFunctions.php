<?php
  session_start();

  include './server/db/db.php';

  function getAllMSGById($chatId) {
    $query = "SELECT * FROM messages ORDER by id DESC WHERE chatId = ".$chatId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "getAllMSGById's query went wrong on DB level.";
      exit;
    } else {
      $messages = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
      }
      $result->free();
      return $messages;
    }
  }

  function getLastMSG($chatId) {
    $query = "SELECT * FROM messages LIMIT 1 ORDER by id DESC WHERE chatId = ".$chatId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "getLastMSG query went wrong at DB level.";
      exit;
    } else {
      $lastMSG = mysqli_fetch_assoc($result);
      $result->free();
      return $lastMSG;
    }
  }

  function deleteByChatId($chatId) {
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