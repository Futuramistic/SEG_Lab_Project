<?php
require("../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet-login.css");
require("navigation.php");
require("../stylesheets/style.html");
?>

<?php

	if(check_login())
	{
		header("Location: AccountsStuff/AccountInfo.php");
		exit();
	}

  if(is_post_request())
  {
    $result=login();
		if($result!==true)
		{
			echo display_errors($result);
		}
		else {
			header("Location: Home.php");
			exit();
		}
  }

	$error=resolve_errors();
	if($error!==false){
		$errors=$error;
	}
	echo display_login_errors($errors);
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
