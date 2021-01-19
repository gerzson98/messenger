
<?php
  include $_SESSION['path'].'server/functions/chatFunctions.php';
  $cardDatas = getAllForCards();
?>
<div id="cardsContainer">
  <?php foreach ($cardDatas as $data) : ?>
    <?php
      include $_SESSION['path'].'portal/components/chatCard.php';
    ?>
  <?php endforeach; ?>
  <?php include $_SESSION['path'].'portal/components/addCard.php'; ?>
</div>