<div class="homePageContainer">
  <?php include './portal/components/errorBox.php'; ?>
  <?php if ($_SESSION['viewHandler'] == "updateSucceed") :?>
    <div class="succedMessage">
      <p>Succesful update!</p>
    </div>
  <?php endif; ?>
  <form method="post" action="../../server/actions/settings.php">
    <input type="text" name="userName" placeholder="Enter your new username!">
    <br>
    <input type="text" name="password" placeholder="Enter your new password!">
    <br>
    <input type="text" name="passwordAgain" placeholder="Repeat your new password!">
    <br>
    <input id="logIn-button" type="submit" name="update" value="UPDATE">
    <br>
    <input id="logIn-button" type="submit" name="back" value="BACK">
  </form>
</div>