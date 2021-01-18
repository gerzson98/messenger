<?php

  function logIn ($userName, $password) {
    $sql = $_SESSION['con'];
    $query = "SELECT id FROM users WHERE userName = '".$userName."' AND password = '".$password."';";
    $result = $sql->query($query);
    if (!$result) {
      die('logIn query went wrong;' .$query);
      exit;
    } elseif ($result->num_rows == 0) {
      return false;
    } else {
      return true;
    }
  }

  function getUserId ($userName) {
    $sql = $_SESSION['con'];
    $getIdQuery = "SELECT id FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($getIdQuery);
    if (!$result) {
      echo "getUserId's query went wrong on DB level.";
      exit;
    } else {
      $id = mysqli_fetch_assoc($result)['id'];
      $result->free();
      return $id;
    }
  }

  function getUserNameById ($userId) {
    $sql = $_SESSION['con'];
    $query = "SELECT userName FROM users WHERE id = ".$userId.";";
    $result = $sql->query($query);
    if (!$result) {
      echo "getUserName failed at DB level.";
      exit;
    } else {
      $userName = $result->fetch_array(MYSQLI_ASSOC)['userName'];
      if ($userName == '') {
        echo "Could not get the userName";
        exit;
      } else {
        return $userName;
      }
    }
  }

  function validateUserName ($userName) {
    $sql = $_SESSION['con'];
    $validateUserQuery = "SELECT id FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($validateUserQuery);
    if (!$result) {
      echo 'ValidateUserNameQuery failed to run.';
      return false;
    } elseif ($result->num_rows == 0) {
      return true;
    } else {
      return false;
    }
  }

  function register ($userName, $password) {
    $sql = $_SESSION['con'];
    if (validateUserName($userName, $sql)) {
      $insertQuery = "INSERT INTO users (userName, password) VALUES ('".$userName."', '".$password."');";
      $result = $sql->query($insertQuery);
      if ($sql->connect_errno) {
        echo "Something went wrong during insert; %s" .$sql->connect_error;
        return false;
      }
      return true;
    } else {
      return false;
    }
  }

  function deleteUser ($userName) {
    $sql = $_SESSION['con'];
    $deleteQuery = "DELETE FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($deleteQuery);
    if (!$result) {
      echo "Something went wrong during deleteUser. Fatal error.";
      return false;
    }
    return true;
  }

  function updateUser ($userName, $password) {
    $sql = $_SESSION['con'];
    $updateQuery = "UPDATE users SET userName = '".$userName."', password = '".$password."' WHERE userName = '".$userName."';";
    $result = $sql->query($updateQuery);
    if (!$result) {
      printf("Something went wrong during updatePassword.");
      return false;
    }
    return true;
  }

?>