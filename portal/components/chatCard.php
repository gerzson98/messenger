<div class="card">
  <h4> <?php echo $data->othersName; ?></h4>
  <div class="chatBox">
    <span><?php echo $data->lastMessage->sentAt; ?> </span>
    <?php echo $data->lastMessage->message; ?>
  </div>
  <form method="post" action="../../server/actions/sendMessage.php">
    <input hidden type="text" name="chatId" value=<?php echo $data->chatId; ?> >
    <input type="text" name="message" placeholder="Quick msg">
    <input id="send-button" type="submit" name="sendMessage" value="SEND">
  </form>
  <br>
  <input id="openChat-button" type="submit" action="../attachRoutes.php" value="OPEN CHAT">
</div>