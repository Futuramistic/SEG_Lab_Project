<?php
function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

//GAME
function validate_game($game)
{
  $errors = [];
  //check name
  //Apparently there exists some games with one letter names
  //So we need to check if it's not empty
  if(is_blank($game['name'])){
    $errors[]= "Name cannot be blank!";
  }

  //platform
  if(is_blank($game['platform'])){
    $errors[]= "Platform cannot be blank!";
  }
  elseif(!has_length($game['platform'],['min' => 2, 'max' => 50])){
    $errors[]="Platform must be between 2 and 50 characters!";
  }

  //format
  if(is_blank($game['format'])){
    $errors[]= "Format cannot be blank!";
  }
  elseif(!has_length($game['format'],['min' => 1, 'max' => 50])){
    $errors[]="Format must be between 1 and 50 characters!";
  }

  //developer
  if(is_blank($game['developer'])){
    $errors[]= "Developer cannot be blank!";
  }
  elseif(!has_length($game['developer'],['min' => 2, 'max' => 50])){
    $errors[]="Developer must be between 2 and 50 characters!";
  }

  //year
  if(is_blank($game['year']))
  {
    $errors[]= "Year cannot be blank!";
  }
  else {
    $year_int = (int) $game['year'];
    if($year_int>date("Y"))
    {
      $errors[]= "Year cannot be greater than the current year!";
    }
    if($year_int<1950)
    {
      $errors[]= "Year cannot be smaller than 1950";
    }
  }
  //Price
  if(is_blank($game['price']))
  {
    $errors[]= "Price cannot be blank!";
  }
  else {
    $price_int = (int) $game['price'];
    if($price_int>500)
    {
      $errors[]= "Price cannot be greater than 500!";
    }
    if($price_int<0)
    {
      $errors[]= "Price cannot be negative";
    }
    if($price_int==0)
    {
      $errors[]= "Price cannot be equal to zero";
    }
  }
  //Age
  if(is_blank($game['PEGI']))
  {
    $errors[]= "Age cannot be blank!";
  }
  else {
    $age_int = (int) $game['PEGI'];
    if($age_int>100)
    {
      $errors[]= "Age cannot be greater than 100!";
    }
    if($age_int<0)
    {
      $errors[]= "Age cannot be negative";
    }
    if($age_int==0)
    {
      $errors[]= "Age cannot be equal to zero";
    }
  }

  $rented_str = (string) $game['rented'];
  if(!has_inclusion_of($rented_str, ["0","1"])) {
      $errors[] = "Rented must be true or false.";
  }

  return $errors;
}
function find_games($game)
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
    if(is_present($game['maxprice']))
    {
      $sql .= " AND price <= '" . db_escape($db,$game['maxprice']) . "'";
    }
    if(is_present($game['minprice']))
    {
      $sql .= " AND price >= '" . db_escape($db,$game['minprice']) . "'";
    }
    $sql.=" ORDER BY name";
    $sql.=";";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}
function find_all_games()
{
  global $db;
  $sql = "SELECT * FROM Game ";
  $sql .= "ORDER BY id";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function find_game_by_id($game)
{
  global $db;
  $sql = "SELECT * FROM Game ";
  $sql .= "WHERE id = '" . db_escape($db,$game['id']) . "'";
  $sql .= " LIMIT 1";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  $game = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $game;
}
function find_all_games_fortmats()
{
  global $db;
  $sql = "SELECT format FROM Game ";
  $sql .= "Group By format";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function find_all_games_PEGI()
{
  global $db;
  $sql = "SELECT PEGI FROM Game ";
  $sql .= "Group By PEGI";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function find_all_games_platforms()
{
  global $db;
  $sql = "SELECT platform FROM Game ";
  $sql .= "Group By platform";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function alter_game($game)
{
  global $db;
  $errors = validate_game($game);
  if(!empty($errors))
  {
    return $errors;
  }
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
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function add_game($game,$options=[])
{
  global $db;
  $errors = validate_game($game);
  if(!empty($errors))
  {
    return $errors;
  }
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
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function delete_game($game)
{
  global $db;
  $sql = "DELETE FROM Game";
  $sql .= " WHERE id='" . db_escape($db,$game['id']) ."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function rent_game($renting)
{
  global $db;
  $sql = "UPDATE Game ";
  $sql .= "SET rented='1' ";
  $sql .= "WHERE id='".db_escape($db,$renting['gameid'])."' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function return_game($renting)
{
  global $db;
  $sql = "UPDATE Game ";
  $sql .= "SET rented='0' ";
  $sql .= "WHERE id='".db_escape($db,$renting['gameid'])."' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}

//USER
function get_last_user()
{
  global $db;
  $sql = "SELECT * ";
  $sql .= "FROM User ";
  $sql .= "WHERE UserID = (SELECT MAX(UserID) FROM User)";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
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
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function find_user_by_username($user)
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "WHERE user_name = '" . db_escape($db,$user['user_name']) . "'";
  $sql .= " LIMIT 1";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
}
function find_all_users()
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "ORDER BY userID";
  $sql.=";";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function delete_user($user)
{
  global $db;
  $sql = "DELETE FROM User";
  $sql .= " WHERE userID='" . db_escape($db,$user['userID']) ."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function validate_user($user, $option=[])
{
  $errors=[];
  //First Name
  if(is_blank($user['firstName'])){
    $errors[]= "First name cannot be blank!";
  }
  elseif(!has_length($user['firstName'],['min' => 4, 'max' => 50])){
    $errors[]="First name must be between 4 and 50 characters!";
  }
  //Second Name
  if(is_blank($user['secondName'])){
    $errors[]= "Second name cannot be blank!";
  }
  elseif(!has_length($user['secondName'],['min' => 4, 'max' => 50])){
    $errors[]="Second name must be between 4 and 50 characters!";
  }

  //Email
  if(is_blank($user['email'])){
    $errors[]= "Email cannot be blank!";
  }
  elseif(!has_valid_email_format($user['email'])){
    $errors[]="Email should have an email format!";
  }
  //UserName
  $userFound = find_user_by_username($user);
  if(isset($option['insert']))
  {
    //produce artificial id
    $lastUser = get_last_user();
    $user['userID'] = $lastUser['userID']+1;
  }
  if(isset($userFound) && $userFound['userID']!=$user['userID'])
  {
    $errors[]="User already exists!";
  }
  if(is_blank($user['user_name'])){
    $errors[]= "Username cannot be blank!";
  }
  elseif(!has_length($user['user_name'],['min' => 4, 'max' => 50])){
    $errors[]="Username must be between 4 and 50 characters!";
  }
  //Password
  if(isset($option['password']))
  {
    if(!is_present($user['password1'])||!is_present($user['password2']))
    {
      $errors[]="Both password and confirm password cannot be blank!";
    }
    else
    {
      if($user['password1']!=$user['password2'])
      {
        $errors[]="Password does not match!";
      }
      if(!has_length_greater_than($user['password'],4))
      {
        $errors[]="Password is too short! Password should have at least 5 characters.";
      }
    }
  }
  //Admin, Administration, Banned
  $admin_str = (string) $user['admin'];
  if(!has_inclusion_of($admin_str, ["0","1"])) {
      $errors[] = "Admin must be true or false.";
  }
  $administration_str = (string) $user['administration'];
  if(!has_inclusion_of($administration_str, ["0","1"])) {
      $errors[] = "Administration must be true or false.";
  }
  $banned_str = (string) $user['banned'];
  if(!has_inclusion_of($banned_str, ["0","1"])) {
      $errors[] = "Banned must be true or false.";
  }
  return $errors;
}
function alter_user($user, $options=[])
{
  global $db;
  $errors = validate_user($user,$options);
  if(!empty($errors))
  {
    return $errors;
  }
  $sql = "UPDATE User";
  $sql .= " SET";
  $sql .= " firstName='" .db_escape($db,$user['firstName'])."',";
  $sql .= " secondName='" .db_escape($db,$user['secondName'])."',";
  $sql .= " email='" .db_escape($db,$user['email'])."',";
  if(is_present($options['password'])){
    $sql .= " password='" .password_hash(db_escape($db,$user['password']),PASSWORD_DEFAULT)."',";
  }
  $sql .= " user_name='" .db_escape($db,$user['user_name'])."',";
  $sql .= " fees='" .db_escape($db,$user['fees'])."',";
  $sql .= " admin='" .db_escape($db,$user['admin'])."',";
  $sql .= " administration='" .db_escape($db,$user['administration'])."',";
  $sql .= " banned='" .db_escape($db,$user['banned'])."'";
  $sql .= " WHERE userID='" .db_escape($db,$user['userID'])."'";
  $sql .= " LIMIT 1";
  $sql .= ";";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function find_user_by_id($user)
{
  global $db;
  $sql = "SELECT * FROM User ";
  $sql .= "WHERE userID = '" . db_escape($db,$user['userID']) . "'";
  $sql .= " LIMIT 1;";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function add_user($user, $options=['password' => true, 'insert' => true])
{
  global $db;
  $errors = validate_user($user,$options);
  if(!empty($errors))
  {
    return $errors;
  }
  $sql = "INSERT INTO User(firstName,secondName,password,email,user_name,admin,administration,banned)";
  $sql .= " VALUES";
  $sql .= "(";
  $sql .= "'".db_escape($db,$user['firstName'])."', ";
  $sql .= "'".db_escape($db,$user['secondName']) . "', ";
  $sql .= "'".password_hash(db_escape($db,$user['password']),PASSWORD_DEFAULT). "', ";
  $sql .= "'".db_escape($db,$user['email']) . "', ";
  $sql .= "'".db_escape($db,$user['user_name']) . "', ";
  $sql .= "'".db_escape($db,$user['admin']) . "', ";
  $sql .= "'".db_escape($db,$user['administration']) . "', ";
  $sql .= "'".db_escape($db,$user['banned']) . "') ";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function charge_user($renting)
{
  global $db;
  return_renting($renting);
  $game['id']=$renting['gameid'];
  $game = find_game_by_id($game);
  $sql = "UPDATE User ";
  $sql .= " SET fees=fees + ".db_escape($db,$game['price']);
  $sql .= " WHERE userID ='".db_escape($db,$renting['userid'])."'";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}

//RENTING
function find_all_unreturned_rentings()
{
  global $db;
  $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
  $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
  $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.returnDate IS NULL";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function find_all_rentings()
{
  global $db;
  $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
  $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
  $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}
function extend_renting($renting)
{
  global $db;
  $sql = "UPDATE Renting ";
  $sql .= "SET dueDate=DATE_ADD(duedate, INTERVAL 7 DAY), ";
  $sql .= "extentions=extentions+1 ";
  $sql .= "WHERE id='".db_escape($db,$renting['id'])."'";
  $sql .= " LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function return_renting($renting)
{
  global $db;
  return_game(find_renting_by_id($renting));
  $sql = "UPDATE Renting ";
  $sql .= "SET returnDate='".date("Y-m-d H:i:s")."'";
  $sql .= " WHERE id='".db_escape($db,$renting['id'])."'";
  $sql .= " LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function validate_renting($game, $user)
{
  $errors = [];
  $rents = isset($user) ? mysqli_num_rows(find_current_rentings_by_userid($user)):0;
  if(!isset($user))
  {
    $errors[]="No user found with this username";
  }
  if($rents>=2 && is_present($user['userID']))
  {
    $errors[]="Too many games rented at the time!";
  }
  $fees_int = $user['fees'] ?? "";
  if($fees_int>0)
  {
    $errors[]="Cannot rent game. Outstanding fees.";
  }
  if(!isset($game['id']))
  {
    $errors[]="Game not found.";
  }
  if(is_present($game['id'])&&$game['rented']=="1")
  {
    $errors[]="Game is currently rented.";
  }
  return $errors;
}
function add_renting($renting)
{
  global $db;
  $user['user_name']=$renting['user_name'] ?? "";
  $game['id']=$renting['gameid'] ?? "";
  $userFound = find_user_by_username($user);
  $gameFound = find_game_by_id($game);
  $errors=validate_renting($gameFound,$userFound);
  if(!empty($errors))
  {
    return $errors;
  }
  rent_game($renting);
  $now = date("Y-m-d H:i:s");
  $due = date_create($now)->add(new DateInterval('P27D'));
  $sql = "INSERT INTO Renting(rentDate,dueDate,userid,gameid)";
  $sql .= " VALUES";
  $sql .= "(";
  $sql .= "'". $now . "', ";
  $sql .= "'". $due->format("Y-m-d H:i:s") ."', ";
  $sql .= "'".$userFound['userID']. "', ";
  $sql .= "'".$renting['gameid']. "') ";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
function find_renting_by_id($renting)
{
    global $db;
    $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
    $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
    $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.id='".db_escape($db,$renting['id']). "'";
    $sql .=" LIMIT 1";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    $renting = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $renting;
}
function find_current_rentings_by_userid($user)
{
    global $db;
    $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
    $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
    $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.returnDate IS NULL AND u.userID=".db_escape($db,$user['userID']);
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}
function delete_renting($renting)
{
  global $db;
  return_renting($renting);
  $sql = "DELETE FROM Renting";
  $sql .= " WHERE id='".db_escape($db,$renting['id'])."'";
  $sql .= " LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result)
  {
      return true;
  }
  else
  {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
}
?>
