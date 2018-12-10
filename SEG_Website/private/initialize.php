<?php
  session_start();
  ob_start();
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('functions.php');
  require('connect.php');
  require('validation_functions.php');
  require('login_functions.php');
  require('classes/DatabaseObject.class.php');
  require('classes/User.class.php');
  require('classes/Game.class.php');
  require('classes/Renting.class.php');
  $errors = [];
  $database = datab_connect();
  DatabaseObject::set_database($database);

  ?>
