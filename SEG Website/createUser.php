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
      <?php
      if(is_post_request())
      {
        $user=[];
        $user['firstName']=$_POST['firstName']??"";
        $user['secondName']=$_POST['secondName']??"";
        $user['password']=$_POST['password']??"";
        $user['email']=$_POST['email']??"";
        $user['user_name']=$_POST['user_name']??"";
        $user['admin']=$_POST['admin']??"";
        if($user['admin']==1)
        {
          dump_admin();
        }
        $user['banned']=$_POST['banned']??"";
        if(add_user($user))
        {
          header('Location:manageUsers.php');
          exit();
        }
        else {}
      }
      ?>

      <form action="createUser.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>First Name</th><td><input  class ="searchForm" type="text" placeholder="First Name" name="firstName"/></td></tr>
      <tr><th>Last Name</th><td><input  class ="searchForm" type="text" placeholder="Second Name" name="secondName"/></td></tr>
      <tr><th>Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password"/></td></tr>
      <tr><th>E-mail</th><td><input  class ="searchForm" type="text" placeholder="E-Mail" name="email"/></td></tr>
      <tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User Name" name="user_name"/></td></tr>
      <tr><th>Admin</th><td><input type="hidden" name="admin" value="0"/><input type="checkbox" name="admin" value="1"/></td></tr>
      <tr><th>Banned</th><td><input type="hidden" name="banned" value="0"/><input type="checkbox" name="banned"value="1"/></td></tr>
      <tr><th></th><td><button type="submit">Submit</button></td></tr>
      </table>
      </form>
</body>
</html>
