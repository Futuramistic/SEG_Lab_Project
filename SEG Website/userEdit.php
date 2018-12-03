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
        input.searchForm{
          width: 400px;
          margin-left:30px;
          margin-right: 10px;
        }
        table.center {
          margin-left:auto;
          margin-right:auto;
          justify-content: center;
        }
        button.search{
        	border-radius: 30px;
        	border:0.1px;
        	background-color: white;
        	color:rgb(117,117,117);
        	font-size: 19px;
          width: 400px;
          margin-top: 10px;
          margin-bottom: 30px;
        }
        select.search{
          border-radius: 30px;
          border:0.1px;
          background-color: white;
          color:rgb(117,117,117);
        	font-size: 19px;
        }
        table.output{
          border-radius: 15px;
        	border:0.1px;
          background-color: white;
         	color:rgb(117,117,117);
        }
        td, th{
          padding-top: 10px;
          padding-left: 10px;
          padding-right: 10px;

        }
        a {
          text-decoration: none;
        }
      </style>
      

      <form action="createUser.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>Change First Name</th><td><input  class ="searchForm" type="text" placeholder="Change First Name" name="firstName"/></td></tr>
      <tr><th>Change Last Name</th><td><input  class ="searchForm" type="text" placeholder="Change Last Name" name="secondName"/></td></tr>
      <tr><th>Change Password</th><td><input  class ="searchForm" type="password" placeholder="Change Password" name="password"/></td></tr>
      <tr><th>Change E-mail</th><td><input  class ="searchForm" type="text" placeholder="Change E-Mail" name="email"/></td></tr>
      <tr><th>Change User Name</th><td><input  class ="searchForm" type="text" placeholder="Change User Name" name="user_name"/></td></tr>
      <tr><th></th><td><button type="submit">Submit</button></td></tr>
      </table>
      </form>
</body>
</html>
