<?php
function is_post_request()
{
  return $_SERVER['REQUEST_METHOD']=='POST';
}

function is_get_request()
{
  return $_SERVER['REQUEST_METHOD']=='GET';
}

function is_blank($value)
{
  return !isset($value)||trim($value)=="";
}

function is_present($value)
{
  return !is_blank($value);
}
?>
