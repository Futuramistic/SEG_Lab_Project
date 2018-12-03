<?php
require("../../../private/initialize.php");
$renting['id']=$_GET['id'];
$result =  return_renting($renting);
if($result){
  header("Location: manageAllRentings.php");
  exit();
}
?>
