<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet-accountinfo.css");
require("../navigation.php");
require("../../stylesheets/style.html");
if(!check_login())
{
	header("Location: ../Login.php");
	exit();
}
check_staff();
?>
<div class ="pagecontainer" style ="margin: 0 auto; width: 100%">
<?php require("usernavigation.php")?>
<div class = "page" style ="float:left; width:74%">
  <div class = "pagecontent">
      <h2 style ="text-align: center; padding-bottom: 10px;">Manage</h2>
      <table>
        <tr><th>Games:</th><td><a href=<?php echo url_for("/administration/games/manageGames.php")?>>Manage games</a></td></tr>
        <tr><th>Users:</th><td><a href=<?php echo url_for("/administration/users/manageUsers.php")?>>Manage users</a></td></tr>
        <tr><th>All Rentings:</th><td><a href=<?php echo url_for("/administration/rentings/manageAllRentings.php")?>>Manage all rentings</a></td></tr>
        <tr><th>Current Rentings:</th><td><a href=<?php echo url_for("/administration/rentings/manageUnreturnedRentings.php")?>>Manage current rentings</a></td></tr>
      </table>
      </div>
  </div>


</div>


</body>
</html>
