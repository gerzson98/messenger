<?php
  session_start();
  include './server/db/db.php';
  include 'userFunctions.php';

  function getIds ($userNameOne, $userNameTwo) {
    $getIdsQuery = "SELECT id FROM users WHERE userName = '".$userNameOne."' OR userName = '".$userNameTwo."';";
    $ids = $sql->query($getIdsQuery);
    if (!$ids) {
      $error = "GetIdsQuery went wrong somehow.";
      header("Location: ../../index.php".urlencode($error));
      exit;
    } elseif ($ids->num_rows < 2) {
      $error = "The username of the addressee isn't right.";
      header("Location: ../../index.php".urlencode($error));
      exit;
    } else {
      $tmpArray = $ids->fetch_array(MYSQLI_NUM);
      $idArray = [$ids[0]['id'], $ids[1]['id']];
      return $idArray;
    }
  }

  function getAllChatIds ($userName) {
    $id = getUserId($userName);
    $getAllQuery = "SELECT id FROM chats WHERE userOne = ".$id." OR userTwo = ".$id.";";
    $result = $sql->query($getAllQuery);
    if (!$result) {
      echo "Something went wrong with getAllChatId's query.";
      exit;
    } else {
      $chatIds = array();
      while ($chatId = mysqli_fetch_assoc($result)) {
        $chatIds[] = $chatId['id'];
      }
      $result->free();
      return $chatIds;
    }
  }

  function createChat ($userName) {
    $ids = getIds($_SESSION['loggedInAs'], $userName);
    $createQuery = "INSERT INTO chats (userOne, userTwo) VALUES (".$ids[0].", ".$ids[1].");";
    if (!$sql->query($createQuery)) {
      $error = "Something went wrong at creating chat.";
      header("Location: ../../index.php".urlencode($error));
      exit;
    } else {
      header("Location: ../../index.php");
      exit;
    }
  }

  function deleteChat ($chatId) {
    $delQuery = "DELETE FROM chats WHERE chatId = ".$chatId.";";
    $result = $sql->query($delQuery);
    if (!$result) {
      echo "Something went wrong deleting chat with id: ".$chatId;
      exit;
    } else {
      echo "Succesfull delete of chat with id: ".$chatId;
      exit;
    }
  }
?>