<?php
require("credentials.php");
function datab_connect(){
  $connection = new mysqli(SERVER, USER, PASSWORD,DB);
  confirm_db_connection($connection);
  return $connection;
}

function confirm_db_connection($connection) {
    if($connection->connect_errno) {
      $msg = "Database connection failed: ";
      $msg .=$connection->connect_error;
      $msg .= " (" . $connection->connect_errno . ")";
      exit($msg);
    }
}

function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }
?>
