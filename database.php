<?php
require("connect.php");
$db = db_connect();
require("functions.php");

function find_game($game)
{
    global $db;
    $sql = "SELECT * FROM Game ";
    $sql .= "WHERE 1 =1";
    if(is_present($game['name']))
    {
      $sql .= " AND name =  '" . db_escape($db,$game['name']) . "'";
    }
    if(is_present($game['developer']))
    {
      $sql .= " AND developer = '" . db_escape($db,$game['developer']) . "'";
    }
    if(is_present($game['year']))
    {
      $sql .= " AND year LIKE '%" .  db_escape($db,$game['year']) . "%'";
    }
    if(is_present($game['platform']))
    {
      $sql .= " AND platform = '" . db_escape($db,$game['platform']). "'";
    }
    if(is_present($game['format']))
    {
      $sql .= " AND format = '" . db_escape($db,$game['format']) . "'";
    }
    if(is_present($game['PEGI']))
    {
      $sql .= " AND PEGI = '" . db_escape($db,$game['PEGI']) . "'";
    }
    if(is_present($game['price']))
    {
      $sql .= " AND price = '" . db_escape($db,$game['price']) . "'";
    }
    $sql.=";";
    $result = mysqli_query($db,$sql);
    return $result;
}
function find_all_games()
{
  global $db;
  $sql = "SELECT * FROM Game ";
  $sql .= "ORDER BY id";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function find_games_by_id($game)
{
  global $db;
  $sql = "SELECT * FROM Game ";
  $sql .= "WHERE id = '" . db_escape($db,$game['id']) . "'";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function find_all_games_fortmats()
{
  global $db;
  $sql = "SELECT format FROM Game ";
  $sql .= "ORDER BY id";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}

function find_all_games_PEGI()
{
  global $db;
  $sql = "SELECT PEGI FROM Game ";
  $sql .= "ORDER BY id";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}

function find_all_games_platforms()
{
  global $db;
  $sql = "SELECT platform FROM Game ";
  $sql .= "ORDER BY id";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}
?>
