<?php
require("../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require("navigation.php");
require("../stylesheets/style.html");
?>
<style>
#loginMain{
	width:550px;
	height:300px;
	float:right;
	margin-top: 40px;
	margin-right:30%;
}
#button {
display: block;
width: 120px;
margin-top:25px;
height 35px;
}
#login{ text-decoration: none; color:black; }
#register{ text-decoration: none; color:black; }
</style>
<?php
  if(is_post_request())
  {
    if($_POST['username']=="")
    {
      echo("EMPTY USER");
    }
    elseif($_POST['password']=="")
    {
      echo("EMPTY PASSWORD");
    }
    else {
      $userLOGIN = [];
      $userLOGIN['user_name'] = $_POST['username'];
      $user = find_user_by_username($userLOGIN);
      if(isset($user))
      {
        if(password_verify($_POST['password'],$user['password']))
        {
          $_SESSION['id']=$user['userID'];
          $_SESSION['username']=$user['user_name'];
          $_SESSION['admin']=$user['admin'];
					$_SESSION['administration']=$user['administration'];
          $_SESSION['banned']=$user['banned'];
          header("Location: Home.php");
        }
        else {
          echo('WRONG PASSWORD');
        }
      }
      else {
        echo('WRONG USER');
      }
    }
  }
?>


<body>
<div id="loginMain">
		<table align="center"><tr><td><h1 align="center"> Login </h1><td>
		<td><h1 align="center"> <a href="Sign-Up.php" id="register">Register</a> </h1></td> </tr>
		<table>
		<form action="Login.php" method="post">
		<tr><td><input type="text" placeholder="Enter your username" name="username"> </td> </tr>
		<tr> <td ><input type="password" placeholder="Password" name="password"></td> </tr>
		<tr> <td  align="center"> <button class="login" type="submit"> Login </button> </td></tr>
    </form>
    </table>
</div>
</body>
</html>
