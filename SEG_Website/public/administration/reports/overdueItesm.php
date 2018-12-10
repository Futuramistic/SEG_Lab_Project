<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
$rentings = Renting::find_all_unreturned();
echo('<table class="output center">');
echo('<tr><th>Renting</th><th>Game ID</th><th>Name</th><th>Rent Date</th><th>Rented by</th></tr>');
foreach($rentings as $renting)
{
  echo('<tr>');
  echo('<td>'.$renting->id.'</td><td>'.$renting->gameid.'</td><td>'.$renting->name.'</td><td>'.$renting->rentDate.'</td><td>'.$renting->user_name.'</td>');
  echo('</tr>');
}
echo('</table>');
?>
