<div class="chatContainer">
  <?php
    include $_SESSION['path']."server/functions/chatFunctions.php";
    $chatId = $_SESSION['chatId'];
    $othersName = getOthersName($chatId);
    if (isset($_POST['loadMore'])) {
      $_SESSION['msgCount'] += 15;
      header("Location: ./index.php");
      exit;
    }
    $messages = getLastSomeMSGById($chatId, $_SESSION['msgCount']);
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
    <div class="messageBlock">
      <form method="post" action="./index.php">
        <input id="loadMore-btn" type="submit" name="loadMore" value="LOAD MORE MESSAGES">
      </form>
    </div>
  </div>
  <?php include './portal/components/errorBox.php'; ?>
  <form method="post" action="../../../server/actions/sendMessage.php">
    <input hidden type="number" name="chatId" value=<?php echo $chatId; ?> >
    <input id="chatMessageInputBox" type="text" name="message" placeholder="Type something...">
    <input id="chatSendButton" type="submit" name="sendMessage" value="SEND">
  </form>
</div>