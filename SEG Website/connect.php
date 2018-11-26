<?php
require("credentials.php");

function db_connect(){
  $connection = mysqli_connect(SERVER, USER, PASSWORD,DB);
  return $connection;
}

function db_close($connection)
{
  if(isset($connection))
  {
    mysqli_close($connection);
  }
}

function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string);
}
 ?>
