<div class="profileBlock">
  <form method="post" action="./portal/attachRoutes.php">
    <h3><?php echo $_SESSION['loggedInAs']; ?></h3>
    <input type="submit" name="editUser" value="Update userinfo">
    <?php if ($_SESSION['viewHandler'] != "cards") : ?>
      <input type="submit" name="back" value="BACK">
    <?php endif; ?>
    <input type="submit" name="logOut" value="LOG OUT">
  </form>
</div>