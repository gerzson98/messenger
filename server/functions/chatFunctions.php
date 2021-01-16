<?php
  session_start();
  include './server/db/db.php';

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

  function deleteChat () {

  }
?>