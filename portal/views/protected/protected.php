<div class="protectedContainer">
  <?php include 'D:/Suli/Info/php/messenger/portal/components/settings.php'; ?>
  <?php if ($_SESSION['viewHandler'] == "update" || $_SESSION['viewHandler'] == "updateSucceed") : ?>
    <?php include 'D:/Suli/Info/php/messenger/portal/views/protected/updateUser.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "cards") : ?>
    <?php include 'D:/Suli/Info/php/messenger/portal/views/protected/cards.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "chat") : ?>
    <?php include 'D:/Suli/Info/php/messenger/portal/views/protected/chat.php'; ?>
  <?php endif; ?>
</div>
