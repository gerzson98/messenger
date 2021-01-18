<div class="card">
  <h4> <?php echo $chat->userName; ?></h4>
  <span><?php echo $chat->sentAt; ?> - </span>
  <?php echo $chat->message; ?>
  <input type="text" method="post" action="../../server/actions/chat.php">
  <br>
  <input id="openChat-button" type="submit" action="../attachRoutes.php" value="OPEN CHAT">
</div>