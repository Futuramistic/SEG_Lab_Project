<?php
require("../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet-login.css");
require("navigation.php");
require("../stylesheets/style.html");
if(is_post_request())
{
		$args=[];
		$args['firstName']=$_POST['firstName']??NULL;
		$args['secondName']=$_POST['secondName']??NULL;
		$args['password1']=$_POST['password1']??NULL;
		$args['password2']=$_POST['password2']??NULL;
		$args['bare_password']=$_POST['password1']??NULL;
		$args['email']=$_POST['email']??NULL;
		$args['user_name']=$_POST['username']??NULL;
		$user = new User($args);
		$user->merge_attributes($args);
		if($_POST['rules']==1)
		{
			$result = $user->create();
			if($result===true)
			{
				set_login_variables();
				header("Location:AccountsStuff/AccountInfo.php");
				exit();
			}
			{
				$errors = $result;
			}
		}
		else
		{
			$errors[]="You have to accept rules of our society to join!";
		}
}
	echo display_errors($errors);
	?>
</head>
<body>

		<div class = "searchpanel" id="loginMain">
			<div class = "tab">
			<li style="float:left; background-color: rgb(250,250,250); box-shadow: inset -1px 2px 15px rgba(190, 190, 190,0.2);"><a href="Login.php" style = "color: rgb(117,117,117); text-decoration:none">Login</a></li>
		</div>
		<div class = "tab">
			<li style="float:right; background-color: white"><a href="Sign-Up.php" style = "color: rgb(117,117,117); text-decoration:none">Sign Up</a></li>
		</div>
<form method="POST" action="Sign-Up.php">
			<div class = "paneldivision">
			<input type="text" placeholder="First name" name="firstName">
		</div>
		<div class = "paneldivision">
		<input type="text" placeholder="Last name" name="secondName">
	</div>
	<div class = "paneldivision">
	<input type="text" placeholder="Username" name="username">
	</div>
	<div class = "paneldivision">
	<input type="text" placeholder="Email" name="email">
</div>
<div class = "paneldivision">
<input type="password" placeholder="Password" name="password1">
</div>
<div class = "paneldivision" id="lastdivision">
<input type="password" placeholder="Confirm Password" name="password2">
</div>
<div class = "paneldivision">
	<div class = "checkbox">
	<article style ="padding-left: 85px;"> I agree to oblige to the <u><a href="Rules.php" style = "color: rgb(117,117,117);">rules</a></u> of the society</article>
		<input type="hidden" name="rules" value="0">
		<input type="checkbox" id="myCheck" name="rules" value="1">
	</div>
</div>
			<button type="submit" id="button">Sign Up</button>
			</form>
	</div>
	<?php
require("footer.php"); ?>
