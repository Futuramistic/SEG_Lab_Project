<?php
require("../../../private/initialize.php");
$renting['id']=$_GET['id'];
$result =  charge_user(find_renting_by_id($renting));
if($result){
  header("Location: manageAllRentings.php");
  exit();
}
?>
