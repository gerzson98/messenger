<div class="chatContainer">
  <?php
    include "D:/Suli/Info/php/messenger/server/functions/chatFunctions.php";
    $chatId = $_SESSION['chatId'];
    $othersName = getOthersName($chatId);
    $messages = getAllMSGById($chatId);
  ?>
  <form action="../attachRoutes.php">
    <input type="submit" name="backToCards" value="BACK">
  </form>
  <?php foreach($messages as $message) : ?>
    <?php if($message->sentBy == $_SESSION['myId']) : ?>
      <div class="myMessageBlock">
        <span><?php echo $message->sentAt?> </span>
        <p><?php echo $message->message; ?></p>
      </div>
    <?php else : ?>
      <div class="othersMessageBlock">
        <span><?php echo $message->sentAt?> </span>
        <p><?php echo $message->message; ?></p>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>

</div>