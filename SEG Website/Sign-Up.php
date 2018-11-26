<?php
require("database.php"); ?>
<html>
<head>
<title>The Computer Gaming Society</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>


<body>
<div class = "banner">
<?php
require("navigation.php");
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
</style>

</head>


<body>
<div id="loginMain">
		<table align="center"><tr><td><h1 align="center"> Register </h1><td>
		<td><h1 align="center"> <a href="Login.php" id="login">Login</a> </h1></td> </tr>
		

		<table>

		<form action="awadyhelp.html">
		<tr> 
		
		<td><input type="text" placeholder="First Name" name="firstname"> </td> </tr>
		<td><input type="text" placeholder="Last Name" name="lastname"> </td> </tr>
		<td><input type="text" placeholder="User Name" name="username"> </td> </tr>
		<td><input type="text" placeholder="Email" name="Email"> </td> </tr>
		<td><tr> <td ><input type="password" placeholder="Password" name="password"></td> </tr>
		<td><tr> <td ><input type="password" placeholder="Confirm Password" name="password"></td> </tr>
		<td><tr> <td  align="center"> <button id="button"> Sign Up </button> </td></tr>

		</table>

</form> 

   <?php
require("footer.php"); ?>
