<?php
  include 'D:/Suli/Info/php/messenger/server/db/db.php';
  include 'userFunctions.php';
  include 'messageFunctions.php';
  include 'D:/Suli/Info/php/messenger/server/classes/cardData.php';

  function getAllChatIds () {
    $sql = $_SESSION['con'];
    $id = $_SESSION['myId'];
    $getAllQuery = "SELECT id FROM chats WHERE userOne = ".$id." OR userTwo = ".$id.";";
    $result = $sql->query($getAllQuery);
    if (!$result) {
      echo "Something went wrong with getAllChatId's query.";
      exit;
    } else {
      $chatIds = array();
      while ($chatId = $result->fetch_array(MYSQLI_ASSOC)) {
        $chatIds[] = $chatId['id'];
      }
      $result->free();
      return $chatIds;
    }
  }

  function getUserIdsByChatId ($chatId) {
    $sql = $_SESSION['con'];
    $query = "SELECT userOne, userTwo FROM chats WHERE id = ".$chatId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "Couldnt get userIds by chat id. Failed at DB level.";
      exit;
    } else {
      $userIds = $result->fetch_array(MYSQLI_ASSOC);
      $result->free();
      return $userIds;
    }
  }

  function getOthersName ($chatId) {
    $sql = $_SESSION['con'];
    $ids = getUserIdsByChatId($chatId);
    if ($ids['userOne'] == $_SESSION['myId']) {
      return getUserNameById($ids['userTwo']);
    } else {
      return getUserNameById($ids['userOne']);
    }
  }
  
  function createChat ($userName) {
    $sql = $_SESSION['con'];
    $ids = array();
    $ids[] = getUserId($_SESSION['loggedInAs']);
    $ids[] = getUserId($userName);
    $createQuery = "INSERT INTO chats (userOne, userTwo) VALUES (".$ids[0].", ".$ids[1].");";
    $result = $sql->query($createQuery);
    if (!$result) {
      $error = "Something went wrong at creating chat.";
      header("Location: ../../index.php".urlencode($error));
      exit;
    } else {
      header("Location: ../../index.php");
      exit;
    }
  }

  function deleteChat ($chatId) {
    $sql = $_SESSION['con'];
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

  function getAllForCards () {
    $chatIds = getAllChatIds();
    $cardDatas = array();
    foreach ($chatIds as $chatId) {
      $othersName = getOthersName($chatId);
      $lastMessage = getLastMSG($chatId);
      $card = new cardData($chatId, $othersName, $lastMessage);
      $cardDatas[] = $card;
    }
    return $cardDatas;
  }

  ?>
