<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
$users = User::outstanding_fees();
$sum=0;
if(!empty($users)){
  echo('<table class="output center">');
  echo('<tr><th>Username</th><th>Fees</th></tr>');
  foreach($users as $user)
  {
      echo('<tr>');
      echo('<td>'.$user->user_name.'</td><td>'.$user->fees.'</td><td><a href=');
      echo(url_for('administration/users/editUser.php'));
      echo('?userID='.$user->userID.'>Correct fees</a></td>');
      echo('</tr>');
      $sum+=$user->fees;
  }
  echo('</table>');
  echo('<table class="output center">');
  echo('<tr>');
  echo('<td>SUM:</td><td>'.$sum.'</td>');
  echo('</tr>');
echo('</table>');
}
else{
  echo('</table>');
  echo('<table class="output center">');
  echo('<tr>');
  echo('<td>No outstanding fees at the moment</td>');
  echo('</tr>');
echo('</table>');
}
?>
