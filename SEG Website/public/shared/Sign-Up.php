<?php
require("../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet-login.css");
require("navigation.php");
require("../stylesheets/style.html");
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
		<form action = "Sign-Up.php">
			<div class = "paneldivision">
			<input type="text" placeholder="First name" name="firstname">
		</div>
		<div class = "paneldivision">
		<input type="text" placeholder="Last name" name="lastname">
	</div>
	<div class = "paneldivision">
	<input type="text" placeholder="Username" name="username">
	</div>
	<div class = "paneldivision">
	<input type="text" placeholder="Email" name="Email">
</div>
<div class = "paneldivision">
<input type="text" placeholder="Password" name="password">
</div>
<div class = "paneldivision" id="lastdivision">
<input type="text" placeholder="Confirm Password" name="password">
</div>
<div class = "paneldivision">
	<div class = "checkbox">
	<article style ="padding-left: 85px;"> I agree to oblige to the <u><a href="Rules.php" style = "color: rgb(117,117,117);">rules</a></u> of the society</article>
		<input type="checkbox"  id="myCheck" onclick="">
	</div>
</div>
			<button type="submit" id="button">Sign Up</button>
			</form>
	</div>
	<?php
require("footer.php"); ?>
	</body>
	</html>
