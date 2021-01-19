<div class="chatContainer">
  <?php
    include "D:/Suli/Info/php/messenger/server/functions/chatFunctions.php";
    $chatId = $_SESSION['chatId'];
    $othersName = getOthersName($chatId);
    $msgCount = 10;
    $messages = array_reverse(getLastSomeMSGById($chatId, $msgCount));
  ?>
  <h1><?php echo $othersName; ?></h1>
  <div id="messagesBlock">
    <?php foreach($messages as $message) : ?>
      <div class="messageBlock">
        <span><?php echo $message->sentAt?> </span>
        <?php if($message->sentBy == $_SESSION['myId']) : ?>
          <div class="myMessageBlock">
            <p><?php echo $message->message; ?></p>
          </div>
        <?php else : ?>
          <div class="othersMessageBlock">
            <p><?php echo $message->message; ?></p>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <form method="post" action="../../../server/actions/sendMessage.php">
    <input hidden type="number" name="chatId" value=<?php echo $chatId; ?> >
    <input id="chatMessageInputBox" type="text" name="message" placeholder="Type something...">
    <input id="chatSendButton" type="submit" name="sendMessage" value="SEND">
  </form>
</div>