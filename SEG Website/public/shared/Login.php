<?php
require("../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet-login.css");
require("navigation.php");
require("../stylesheets/style.html");
?>

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

		<div class = "searchpanel" id="loginMain">
			  <div class = "tab">
			     <li style="float:left; background-color: white;"><a href="Login.php" style = "color: rgb(117,117,117); text-decoration:none">Login</a></li>
		      </div>
		      <div class = "tab">
			     <li style="float:right; background-color: rgb(250,250,250); box-shadow: inset 2px -1px 15px rgba(190, 190, 190,0.2);"><a href="Sign-Up.php" id="register" style = "color: rgb(117,117,117); text-decoration:none">Sign Up</a></li>
		      </div>
    		<form action="Login.php" method="post">
			     <div class = "paneldivision">
			         <input type="text" placeholder="Username" name="username">
		         </div>
        	   	 <div class = "paneldivision" style="margin-bottom: 10px;">
		              <input type="password" placeholder="Password" name="password">
		         </div>
			     <button type="submit" class="button">Login</button>
    		</form>
    	   </div>
</body>
</html>
