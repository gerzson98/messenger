
<?php
  include 'D:/Suli/Info/php/messenger/server/functions/chatFunctions.php';
  $cardDatas = getAllForCards();
?>
<div id="cardsContainer">
  <?php foreach ($cardDatas as $data) : ?>
    <?php
      include 'D:/Suli/Info/php/messenger/portal/components/chatCard.php';
    ?>
  <?php endforeach; ?>
</div>
<?php include 'D:/Suli/Info/php/messenger/portal/components/addCard.php'; ?>