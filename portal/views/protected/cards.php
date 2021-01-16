<?php foreach ($chats as $chat) : ?>
  <?php
    $userName = $chat->userName;
    $lastMSG = $chat->lastMSG;
    include '../../components/chatCard.php';
  ?>
<?php endforeach; ?>
<?php include './portal/components/addCard.php'; ?>