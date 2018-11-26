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
      $sql .= " AND name LIKE  '" . db_escape($db,$game['name']) . "%'";
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
    $sql.=" ORDER BY name";
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
  $sql .= "Group By format";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}

function find_all_games_PEGI()
{
  global $db;
  $sql = "SELECT PEGI FROM Game ";
  $sql .= "Group By PEGI";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}

function find_all_games_platforms()
{
  global $db;
  $sql = "SELECT platform FROM Game ";
  $sql .= "Group By platform";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function alter_game($game)
{
  global $db;
  $sql = "UPDATE Game";
  $sql .= " SET";
  $sql .= " name='" .db_escape($db,$game['name'])."',";
  $sql .= " platform='" .db_escape($db,$game['platform'])."',";
  $sql .= " format='" .db_escape($db,$game['format'])."',";
  $sql .= " developer='" .db_escape($db,$game['developer'])."',";
  $sql .= " year='" .db_escape($db,$game['year'])."',";
  $sql .= " price='" .db_escape($db,$game['price'])."',";
  $sql .= " PEGI='" .db_escape($db,$game['PEGI'])."',";
  $sql .= " rented='" .db_escape($db,$game['rented'])."',";
  $sql .= " image='" .db_escape($db,$game['image'])."',";
  $sql .= " review='" .db_escape($db,$game['review'])."'";
  $sql .= " WHERE id='" .db_escape($db,$game['id'])."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  echo($sql);
  $result = mysqli_query($db,$sql);
  return $result;
}
function dump_admin()
{
  global $db;
  $sql = "UPDATE User";
  $sql .= " SET";
  $sql .= " admin='0'";
  $sql .= " WHERE admin='1'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  echo($sql);
  $result = mysqli_query($db,$sql);
  return $result;
}
function find_user_by_username($user)
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "WHERE user_name = '" . db_escape($db,$user['user_name']) . "'";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function add_game($game,$options=[])
{
  global $db;
  $sql = "INSERT INTO Game(name,platform,format,developer,year,price,PEGI ";
  if(isset($options['image'])){  $sql .= ",image";}
  if(isset($options['review'])){  $sql .= ",review";}
  $sql .= ",rented) VALUES";
  $sql .= "(";
  $sql .= "'".db_escape($db,$game['name'])."', ";
  $sql .= "'".db_escape($db,$game['platform']) . "', ";
  $sql .= "'".db_escape($db,$game['format']) . "', ";
  $sql .= "'".db_escape($db,$game['developer']) . "', ";
  $sql .= "'".db_escape($db,$game['year']) . "', ";
  $sql .= "'".db_escape($db,$game['price']) . "', ";
  $sql .= "'".db_escape($db,$game['PEGI']) . "', ";
  if(isset($options['image'])){  $sql .= "'".db_escape($db,$game['image']) . "', ";}
  if(isset($options['review'])){  $sql .= "'".db_escape($db,$game['review']) . "', ";}
  $sql .= "'".db_escape($db,$game['rented']) . "') ";
  $result = mysqli_query($db,$sql);
  return $result;
}
function delete_game($game)
{
  global $db;
  $sql = "DELETE FROM Game";
  $sql .= " WHERE id='" . db_escape($db,$game['id']) ."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function find_all_users()
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "ORDER BY userID";
  $sql.=";";
  return mysqli_query($db,$sql);
}
function delete_user($user)
{
  global $db;
  $sql = "DELETE FROM User";
  $sql .= " WHERE userID='" . db_escape($db,$user['userID']) ."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function alter_user($user)
{
  global $db;
  $sql = "UPDATE User";
  $sql .= " SET";
  $sql .= " firstName='" .db_escape($db,$user['firstName'])."',";
  $sql .= " secondName='" .db_escape($db,$user['secondName'])."',";
  $sql .= " email='" .db_escape($db,$user['email'])."',";
  $sql .= " user_name='" .db_escape($db,$user['user_name'])."',";
  $sql .= " fees='" .db_escape($db,$user['fees'])."',";
  $sql .= " admin='" .db_escape($db,$user['admin'])."',";
  $sql .= " administration='" .db_escape($db,$user['administration'])."',";
  $sql .= " banned='" .db_escape($db,$user['banned'])."'";
  $sql .= " WHERE userID='" .db_escape($db,$user['userID'])."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  echo($sql);
  $result = mysqli_query($db,$sql);
  return $result;
}
function find_user_by_id($user)
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "WHERE userID = '" . db_escape($db,$user['userID']) . "'";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  return $result;
}
function add_user($game)
{
  global $db;
  $sql = "INSERT INTO User(firstName,secondName,password,email,user_name,admin,administration,banned)";
  $sql .= " VALUES";
  $sql .= "(";
  $sql .= "'".db_escape($db,$game['firstName'])."', ";
  $sql .= "'".db_escape($db,$game['secondName']) . "', ";
  $sql .= "'".password_hash(db_escape($db,$game['password']),PASSWORD_DEFAULT). "', ";
  $sql .= "'".db_escape($db,$game['email']) . "', ";
  $sql .= "'".db_escape($db,$game['user_name']) . "', ";
  $sql .= "'".db_escape($db,$game['admin']) . "', ";
  $sql .= "'".db_escape($db,$game['administration']) . "', ";
  $sql .= "'".db_escape($db,$game['banned']) . "') ";
  $result = mysqli_query($db,$sql);
  return $result;
}
?>
