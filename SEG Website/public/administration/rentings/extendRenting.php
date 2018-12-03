<?php
require("../../../private/initialize.php");
$renting['id']=$_GET['id'];
$result =  extend_renting($renting);
if($result){
  header("Location: manageUnreturnedRentings.php");
  exit();
}
?>
