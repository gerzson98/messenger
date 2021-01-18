<div class="profileBlock">
  <h3><?php echo $_SESSION['loggedInAs']; ?></h3>
  <form method="post" action="./portal/attachRoutes.php">
    <input type="submit" name="editUser" value="Update userinfo">
    <?php if ($_SESSION['viewHandler'] != "cards") : ?>
      <input type="submit" name="back" value="BACK">
    <?php endif; ?>
    <input type="submit" name="logOut" value="LOG OUT">
  </form>
</div>