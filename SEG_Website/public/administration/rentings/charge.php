<?php
require("../../../private/initialize.php");
check_staff();
if(!isset($_GET['id']))
{
  header("Location: manageAllRentings.php");
  exit();
}
$renting = Renting::find_by_id($_GET['id']);
$result =  $renting->charge_user();
if($result){
  header("Location: manageAllRentings.php");
  exit();
}
?>
