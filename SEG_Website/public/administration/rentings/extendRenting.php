<?php
require("../../../private/initialize.php");
check_staff();
if(!isset($_GET['id']))
{
  header("Location: manageUnreturnedRentings.php");
  exit();
}
$renting= Renting::find_by_id($_GET['id']);
$result =  $renting->extend_renting();
if($result){
  header("Location: manageUnreturnedRentings.php");
  exit();
}
?>
