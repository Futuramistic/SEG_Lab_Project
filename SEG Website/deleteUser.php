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
        $user['userID']=$_POST['userID'];
        $result=delete_user($user);
        if($result)
        {
          header('Location:manageUsers.php');
          exit();
        }
      }
      else {
        $userID['userID']=$_GET['userID'];
        $result = find_user_by_id($userID);
        $user = mysqli_fetch_assoc($result);
      }
      ?>
      <form action="deleteUser.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th><a href="manageUsers.php">Go Back</a></th></tr>
      <tr><th>Do you want to delete this user?</th></tr>
      <tr><th>First Name</th><td><?php echo($user['firstName']);?></td></tr>
      <tr><th>Last Name</th><td><?php echo($user['secondName']);?></td></tr>
      <tr><th>Password</th><td><?php echo($user['password']);?></td></tr>
      <tr><th>E-mail</th><td><?php echo($user['email']);?></td></tr>
      <tr><th>User Name</th><td><?php echo($user['user_name']);?></td></tr>
      <tr><th>Fees</th><td><?php echo($user['fees']."$");?></td></tr>
      <tr><th>Admin</th><td><?php if($user['admin']==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th>Administration</th><td><?php if($user['administration']==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th>Banned</th><td><?php if($user['banned']==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th></th><td><button type="submit" name="userID" value="<?php echo($userID['userID']);?>">Delete</button></td></tr>
      </table>
      </form>
         <?php
require("footer.php"); ?>
