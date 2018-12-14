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
    <h2 style ="text-align: center; padding-bottom: 10px;">Reports</h2>
    <table>
      <tr><th>Users to ban:</th><td><a href=<?php echo url_for("/administration/reports/usersToBan.php")?>>See users to ban</a></td></tr>
      <tr><th>Banned users:</th><td><a href=<?php echo url_for("/administration/reports/bannedUsers.php")?>>See banned users</a></td></tr>
      <tr><th>Overdue Items:</th><td><a href=<?php echo url_for("/administration/reports/overdueItems.php")?>>See overdue items</a></td></tr>
      <tr><th>Outstanding fees:</th><td><a href=<?php echo url_for("/administration/reports/outstangingFees.php")?>>See outstanding fees</a></td></tr>
    </table>
  </div>
</div>


</div>


</body>
</html>
