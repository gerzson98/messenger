<?php
$_SESSION['con'] = new mysqli('localhost', 'root', 'root', 'messenger');
  if ($_SESSION['con']->connect_errno) {
    die('Failed to connect to MySQL: '.$_SESSION['con']->connect_error);
    exit;
  }
?>