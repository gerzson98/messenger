
<?php
  $getChats = "SELECT id FROM chats WHERE userOne = '".$_SESSION['loggedInAs']."' OR userTwo ='".$_SESSION['loggedInAs']."';";
  $chatIds = $sql->query($getChats);
?>
<?php foreach ($chats as $chat) : ?>
  <?php
    $userName = $chat->userName;
    $lastMSG = $chat->lastMSG;
    include '../../components/chatCard.php';
  ?>
<?php endforeach; ?>
<?php include './portal/components/addCard.php'; ?>