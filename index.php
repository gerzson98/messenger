<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./portal/style/css/style.css" type="text/css"/>
  </head>
  <body>
    <?php
      session_start();
      $_SESSION['path'] = "D:/Suli/Info/php/messenger/";
      if (!$_SESSION['viewHandler']) {
        $_SESSION['viewHandler'] = null;
      }
      if (!$_SESSION['loggedInAs']) {
        $_SESSION['loggedInAs'] = null;
      }
    ?>
    <?php if ($_SESSION['viewHandler'] == "register") : ?>
      <?php include('./portal/views/public/register.php'); ?>
    <?php elseif(!$_SESSION['loggedInAs']) : ?>
      <?php include('./portal/views/public/logIn.php'); ?>
    <?php else : ?>
      <?php include('./portal/views/protected/protected.php'); ?>
    <?php endif; ?>
  </body>
</html>