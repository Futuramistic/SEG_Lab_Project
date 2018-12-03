<?php
require("credentials.php");

function db_connect(){
  $connection = mysqli_connect(SERVER, USER, PASSWORD,DB);
  confirm_db_connect();
  return $connection;
}

function db_close($connection)
{
  if(isset($connection))
  {
    mysqli_close($connection);
  }
}

function db_disconnect($connection)
{
  db_close($connection);
}

function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string);
}
 ?>
