  <?php include $_SESSION['path'].'portal/components/settings.php'; ?>
  <?php if ($_SESSION['viewHandler'] == "update" || $_SESSION['viewHandler'] == "updateSucceed") : ?>
    <?php include $_SESSION['path'].'portal/views/protected/updateUser.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "cards") : ?>
    <?php include $_SESSION['path'].'portal/views/protected/cards.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "chat") : ?>
    <?php include $_SESSION['path'].'portal/views/protected/chat.php'; ?>
  <?php endif; ?>
