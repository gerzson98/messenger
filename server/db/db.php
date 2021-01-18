<?php
$sql = new mysqli('localhost', 'root', 'root', 'messenger');
  if ($sql->connect_errno) {
    die('Failed to connect to MySQL: '.$sql->connect_error);
    exit;
  }
?>