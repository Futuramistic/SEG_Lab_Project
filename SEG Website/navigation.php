<<<<<<< HEAD
<html>
<head>
<title><?php echo($title);?></title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="alternate stylesheet" type="text/css" href="css/bootstrap.min.css" title="bootstrap"/>
</head>
=======
>>>>>>> 275edd1b28f0a4eceaf7d04f6d7ed1b085ad00e1
<div class = "nav">
  <div class = "innernav">
    <div class="navtext">
      <li style="font-size: 19; font-weight: 900;">The Computer Gaming Society</li>
      <li style = "float: right"><a href="Login.php">My Account</a></li>
      <li style = "float: right"><a href="Search.php">Search</a></li>
      <li style = "float: right"><a href="Home.php">Home</a></li>
			<?php if(isset($_SESSION['username']))
			{
				echo('<li style = "float: right"><a href="Logout.php">Log Out</a></li>');
				echo('<li style = "float: right">LOGGED AS:'.$_SESSION['username'].' </li>');
			}?>
  </div>
</div>
</div>
<div class = "banner">
