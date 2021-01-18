<div class="profileBlock">
  <h3><?php echo $_SESSION['loggedInAs']; ?></h3>
  <form method="post" action="./portal/attachRoutes.php">
    <input type="submit" name="editUser" value="Update userinfo">
    <br>
    <input type="submit" name="logOut" value="Log Out">
  </form>
</div>