<?php
  session_start();
  include './server/db/db.php';

  function logIn ($userName, $password) {
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
    $getIdQuery = "SELECT id LIMIT 1 FROM users WHERE userName = '".$userName."';";
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

  function validateUserName ($userName) {
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
    $deleteQuery = "DELETE FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($deleteQuery);
    if (!$result) {
      echo "Something went wrong during deleteUser. Fatal error.";
      return false;
    }
    return true;
  }

  function updateUser ($userName, $password) {
    $updateQuery = "UPDATE users SET userName = '".$userName."', password = '".$password."' WHERE userName = '".$userName."';";
    $result = $sql->query($updateQuery);
    if (!$result) {
      printf("Something went wrong during updatePassword.");
      return false;
    }
    return true;
  }

?>