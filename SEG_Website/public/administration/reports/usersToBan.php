<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
$users = User::find_bannable_behaviour();
echo('<table class="output center">');
echo('<tr><th>Username</th><th>Number of Overdue Items</th></tr>');
foreach($users as $user)
{
  if($user->overdue>=3)
  {
    echo('<tr>');
    echo('<td>'.$user->user_name.'</td><td>'.$user->overdue.'</td><td><a href="ban.php?user_name='.$user->user_name.'">Ban</a></td>');
    echo('</tr>');
  }
}
echo('</table>');
?>
