<div class="chatContainer">
  <?php
    include "D:/Suli/Info/php/messenger/server/functions/chatFunctions.php";
    $chatId = $_SESSION['chatId'];
    $othersName = getOthersName($chatId);
    $messages = getAllMSGById($chatId);
  ?>
  <div id="messagesBlock">
    <?php foreach($messages as $message) : ?>
      <?php if($message->sentBy == $_SESSION['myId']) : ?>
        <div class="myMessageBlock">
          <span><?php echo $message->sentAt?> </span>
          <?php echo $message->message; ?>
        </div>
      <?php else : ?>
        <div class="othersMessageBlock">
          <span><?php echo $message->sentAt?> </span>
          <?php echo $message->message; ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <form method="post" action="../../../server/actions/sendMessage.php">
    <input hidden type="number" name="chatId" value=<?php echo $chatId; ?> >
    <input id="chatMessageInputBox" type="text" name="message" placeholder="Type something...">
    <input id="send-button" type="submit" name="sendMessage" value="SEND">
  </form>
  
</div>