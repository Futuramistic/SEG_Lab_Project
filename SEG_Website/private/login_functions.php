<?php

/**
**Check if user is logged in;
**/
function check_login(){
  if(isset($_SESSION['id']))
  {
    return true;
  }
  return false;
}

/**
**Check if user is banned
**/
function check_banned(){
  if(isset($_SESSION['banned'])&&$_SESSION['banned']==1)
  {
    //Banned user
    header("Location:" . url_for("/shared/Login.php"));
    $_SESSION['error']=111;
    exit();
  }
}

/**
**Check if user is member of staff;
**Redirects other users to Login page
**/
function check_staff(){
  if((!isset($_SESSION['admin'])||$_SESSION['admin']==0)&&(!isset($_SESSION['administration'])||$_SESSION['administration']==0))
  {
    //Unauthorized user
    header("Location:" . url_for("/shared/Login.php"));
    $_SESSION['error']=500;
    exit();
  }
}

/**
**Unset all session variables
**/
function logout()
{
  unset($_SESSION['admin']);
  unset($_SESSION['id']);
  unset($_SESSION['administration']);
  unset($_SESSION['username']);
  unset($_SESSION['banned']);
}

/**
**Check if user can log in
**/
function verify_login()
{
  $errors=[];

  if($_POST['username']=="")
  {
    $errors[]="Username cannot be empty";
  }

  if($_POST['password']=="")
  {
    $errors[]="Password cannot be empty";
  }

  if($_POST['username']!="")
  {
    $user = User::find_by_username($_POST['username']);
    if(!$user||!password_verify($_POST['password'],$user->password))
    {
      $errors[]="Username or password had an error";
    }
  }
  return $errors;
}

/**
**Log user to the website
**/
function login()
{
  $errors=verify_login();
  if(!empty($errors))
  {
    return $errors;
  }
  return set_login_variables();
}

/**
**Set login variables
**/
function set_login_variables()
{
  $user = User::find_by_username($_POST['username']);
  $_SESSION['id']=$user->userID;
  $_SESSION['username']=$user->user_name;
  $_SESSION['admin']=$user->admin;
  $_SESSION['administration']=$user->administration;
  $_SESSION['banned']=$user->banned;
  $_SESSION['error']="";
  return true;
}

/**
**Get error code and produce error message
**/
function resolve_errors()
{
  if(isset($_SESSION['error'])&&$_SESSION['error']!="")
  {
    if($_SESSION['error']==111)
    {
      $errors[]="Error: User is banned";
    }
    else if($_SESSION['error']==500)
    {
      $errors[]="Error: Staff only area";
    }
    $_SESSION['error']="";
    return $errors;
  }
  return false;
}

/**
**Display login error
**/
function display_login_errors($errors)
{
    $output = '';
    if(!empty($errors)) {
      $output .= "<div style=\"text-align: center;\">";
      $output .= "<div class=\"errors\">";
      $output .= "Server error";
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
 ?>
