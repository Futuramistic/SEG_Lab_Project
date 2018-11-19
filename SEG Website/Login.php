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

</style>

</head>


<body>
<div id="loginMain">
		<h1 align="center"> Login here </h1>

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

