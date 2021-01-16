<div class="homePageContainer">
  <?php if ($_SESSION['viewHandler'] == "registerSucceed") : ?>
    <div class="succedMessage">
      <p>Succesful registration!</p>
    </div>
  <?php endif; ?>
  <?php include './portal/components/errorBox.php'; ?>
  <form method="post" action="../../server/actions/logIn.php">
    <input type="text" name="userName" placeholder="Enter your username!">
    <br>
    <input type="text" name="password" placeholder="Enter your password!">
    <br>
    <input id="logIn-button" type="submit" name="logIn" value="LOG IN">
    <input id="logIn-button" type="submit" name="register" value="Register">
  </form>
</div>