<?php
include "D:/Suli/Info/php/messenger/config/config.php";

$sql = new mysqli($HOST, $DB_UN, $DB_PW, $DB_NAME);
  if ($sql->connect_errno) {
    die('Failed to connect to MySQL: '.$sql->connect_error);
    exit;
  }
?>