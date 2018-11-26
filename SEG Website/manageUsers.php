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


    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="createUser.php">Create New User</a></th></tr>
    <tr>
    <th>ID        </th>
    <th>First Name      </th>
    <th>Last Name  </th>
    <th>Password Hash    </th>
    <th>E-mail </th>
    <th>User Name      </th>
    <th>Fees      </th>
    <th>Admin    </th>
    <th>Administration     </th>
    <th>Banned      </th>
    <tr>
    <?php  $result = find_all_users();
    while($user = mysqli_fetch_assoc($result))
    {
      echo("<tr>");
      echo("<td>{$user['userID']}</td>");
      echo("<td>{$user['firstName']}</td>");
      echo("<td>{$user['secondName']}</td>");
      echo("<td>{$user['password']}</td>");
      echo("<td>{$user['email']}</td>");
      echo("<td>{$user['user_name']}</td>");
      echo("<td>{$user['fees']} $</td>");
      if($user['admin']==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      if($user['administration']==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      if($user['banned']==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      ?>
      <td><a class="action" href= "<?php echo('editUser.php?userID='. $user['userID'] ); ?>">Edit</a></td>
      <td><a class="action" href= "<?php echo('deleteUser.php?userID='. $user['userID'] ); ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
    </table>

<?php require("footer.php") ?>
