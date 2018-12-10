<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
$users = User::find_all_banned();
echo('<table class="output center">');
echo('<tr><th>Username</th><th>Ban date</th></tr>');
foreach($users as $user)
{
    echo('<tr>');
    echo('<td>'.$user->user_name.'</td><td>'.$user->banDate.'</td>');
    $banAt = date_create($user->banDate);
    $now = date_create(date("Y-m-d H:i:s"));
    $elapsed = $now->diff($banAt);
    echo("<td>{$elapsed->format("Months banned: %m")}</td>");
    if($elapsed->m >=6){
      echo('<td><a href="unban.php?user_name='.$user->user_name.'">Unban user</a></td>');
    }
    echo('</tr>');
}
echo('</table>');
?>
