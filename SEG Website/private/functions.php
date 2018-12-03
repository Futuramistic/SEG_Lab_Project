<?php

function url_for($script_path)
{
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="")
{
  return urlencode($string);
}

function raw_u($string="")
{
  return rawurlencode($string);
}

function h($string="")
{
  return htmlspecialchars($string);
}

function is_post_request()
{
  return $_SERVER['REQUEST_METHOD']=='POST';
}

function is_get_request()
{
  return $_SERVER['REQUEST_METHOD']=='GET';
}
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div style=\"text-align: center;\">";
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul class=\"errors\">";
    foreach($errors as $error) {
      $output .= "<li class=\"errors\">" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
    $output .= "</div>";
  }
  return $output;
}

function createHeader($title,$stylesheetURL){
  echo('<html>
  <head>
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/Antu_preferences-desktop-gaming.svg/2000px-Antu_preferences-desktop-gaming.svg.png">
  <title>'.$title.'</title>
  	<link rel="stylesheet" type="text/css" href="'.url_for($stylesheetURL).'">
  </head>
  <body>
  <div class = "banner">');
}
?>
