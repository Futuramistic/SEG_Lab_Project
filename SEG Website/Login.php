<?php require("navigation.php")?>

  <head>
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

		<form action="awadyhelp.html" method="POST">
		<tr> 
			<td class>
		<input type="text" placeholder="Enter your username" name="username"> </td> </tr>
		<tr> <td ><input type="password" placeholder="Password" name="password"></td> </tr>
		<tr> <td  align="center"> <button id="button"> Login </button> </td></tr>

		</table>

</form> 

</body>

</html>

