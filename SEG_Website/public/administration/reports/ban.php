<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
global $db;
$user = User::find_by_username($_GET['user_name']??NULL);
if($user===false)
{
  header("Location: usersToBan.php");
  exit();
}
$result=$user->ban();
if($result)
{
  header("Location: usersToBan.php");
  exit();
}
?>
