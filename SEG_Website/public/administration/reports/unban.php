<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
$user=User::find_by_username($_GET['user_name']);
if($user===false)
{
  header("Location: bannedUsers.php");
  exit();
}
$result=$user->unban();
if($result){
header("Location: bannedUsers.php");
exit();
}
?>
