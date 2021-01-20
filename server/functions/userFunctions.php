<?php

  function logIn ($userName, $password) {
    include $_SESSION['path'].'server/db/db.php';
    $query = "SELECT password FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($query);
    if (!$result) {
      die('logIn query went wrong;' .$query);
      exit;
    } elseif ($result->num_rows == 0) {
      return false;
    } else {
      $dbPassword = $result->fetch_array(MYSQLI_ASSOC)['password'];
      return password_verify($password, $dbPassword);
    }
  }

  function getUserId ($userName) {
    include $_SESSION['path'].'server/db/db.php';
    $getIdQuery = "SELECT id FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($getIdQuery);
    $sql->close();
    if (!$result) {
      echo "getUserId's query went wrong on DB level.";
      exit;
    } else {
      $id = mysqli_fetch_assoc($result);
      $result->free();
      if (!$id['id']) {
        return 0;
      } else {
        return $id['id'];
      }
    }
  }

  function getUserNameById ($userId) {
    include $_SESSION['path'].'server/db/db.php';
    $query = "SELECT userName FROM users WHERE id = ".$userId.";";
    $result = $sql->query($query);
    $sql->close();
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
    include $_SESSION['path'].'server/db/db.php';
    $validateUserQuery = "SELECT id FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($validateUserQuery);
    $sql->close();
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
    include $_SESSION['path'].'server/db/db.php';
    if (validateUserName($userName)) {
      $pwToDb = password_hash($password, PASSWORD_DEFAULT);
      $insertQuery = "INSERT INTO users (userName, password) VALUES ('".$userName."', '".$pwToDb."');";
      $result = $sql->query($insertQuery);
      if ($sql->connect_errno) {
        $sql->close();
        return false;
      } elseif (!$result) {
        $sql->close();
        return false;
      } else {
        $sql->close();
        return true;
      }
    } else {
      $sql->close();
      return false;
    }
  }

  function deleteUser ($userName) {
    include $_SESSION['path'].'server/db/db.php';
    $deleteQuery = "DELETE FROM users WHERE userName = '".$userName."';";
    $result = $sql->query($deleteQuery);
    $sql->close();
    if (!$result) {
      echo "Something went wrong during deleteUser. Fatal error.";
      return false;
    }
    return true;
  }

  function updateUser ($userName, $password) {
    include $_SESSION['path'].'server/db/db.php';
    $pwToDb = password_hash($password, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users SET userName = '".$userName."', password = '".$pwToDb."' WHERE userName = '".$userName."';";
    $result = $sql->query($updateQuery);
    $sql->close();
    if (!$result) {
      printf("Something went wrong during updatePassword.");
      return false;
    }
    return true;
  }

?>