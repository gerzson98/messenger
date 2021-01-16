<div class="protectedContainer">
  <?php include 'portal/components/settings.php'; ?>
  <?php if ($_SESSION['viewHandler'] == "update" || $_SESSION['viewHandler'] == "updateSucceed") : ?>
    <?php include './portal/views/protected/updateUser.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "cards") : ?>
    <?php include './portal/views/protected/cards.php'; ?>
  <?php elseif ($_SESSION['viewHandler'] == "chat") : ?>
    <?php include './portal/views/protected/chat.php'; ?>
  <?php endif; ?>
</div>
