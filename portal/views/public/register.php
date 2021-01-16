<div class="homePageContainer">
  <?php include './portal/components/errorBox.php'; ?>
  <form method="post" action="../../server/actions/register.php">
    <input type="text" name="userName" placeholder="Enter your username!">
    <br>
    <input type="text" name="password" placeholder="Enter your password!">
    <br>
    <input type="text" name="passwordAgain" placeholder="Repeat your password!">
    <br>
    <input id="logIn-button" type="submit" name="register" value="REGISTER">
    <br>
    <input id="logIn-button" type="submit" name="backToLogIn" value="Back to Log In page">
  </form>
</div>