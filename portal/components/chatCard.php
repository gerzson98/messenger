<div class="card">
  <h3> <?php echo $data->othersName; ?></h3>
  <div class="chatBox">
    <span><?php echo $data->lastMessage->sentAt; ?> </span>
    <?php
     if(strlen($data->lastMessage->message) > 80) {
       echo substr($data->lastMessage->message, 0, 80)."...";
     } else {
       echo $data->lastMessage->message;
     }
    ?>
  </div>
  <form method="post" action="../../server/actions/sendMessage.php">
    <input hidden type="text" name="chatId" value=<?php echo $data->chatId; ?> >
    <input type="text" name="message" placeholder="Quick msg">
    <input id="send-button" type="submit" name="sendMessage" value="SEND">
  </form>
  <br>
  <form method="post" action="./portal/attachRoutes.php">
    <input hidden type="number" name="chatId" value=<?php echo $data->chatId; ?> >
    <input id="openChat-button" type="submit" name="openChat" value="OPEN CHAT">
  </form>
</div>