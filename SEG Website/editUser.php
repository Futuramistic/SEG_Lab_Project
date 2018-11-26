<?php
require("database.php");
require("navigation.php");
?>
      <style>
        input.searchForm{
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
          margin-top: 20px;
          border-radius: 15px;
        	border:0.1px;
          background-color: white;
         	color:rgb(117,117,117);
          padding-top: 10px;
          padding-bottom: 10px;
          margin-bottom: 20px;
        }
        td, th{
          padding-left: 10px;
          padding-right: 10px;
          padding-top: 10px;
          vertical-align: middle;
          text-align: center;
        }

      </style>
      <?php
      if(is_get_request())
      {
        $userID = [];
        $userID['userID']=$_GET['userID'] ?? "";
        $result = find_user_by_id($userID);
        $user =  mysqli_fetch_assoc($result)
        ?>
          <form action="editUser.php" method="post">
          <table class="center output" style="text-align: center;">
          <tr><th>First Name</th><td><input  class ="searchForm" type="text" placeholder="First Name" name="firstName" value="<?php echo($user['firstName']);?>"/></td></tr>
          <tr><th>Last Name</th><td><input  class ="searchForm" type="text" placeholder="Second Name" name="secondName" value="<?php echo($user['secondName']);?>"/></td></tr>
          <tr><th>E-mail</th><td><input  class ="searchForm" type="text" placeholder="E-Mail" name="email" value="<?php echo($user['email']);?>"/></td></tr>
          <tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User Name" name="user_name" value="<?php echo($user['user_name']);?>"/></td></tr>
          <tr><th>Admin</th><td><input type="hidden" name="admin" value="0"/><input type="checkbox" name="admin" value="1" <?php if($user['admin']==1){echo ("checked");}?>/></td></tr>
          <tr><th>Banned</th><td><input type="hidden" name="banned" value="0"/><input type="checkbox" name="banned"value="1" <?php if($user['banned']==1){echo ("checked");}?>/></td></tr>
          <tr><th></th><td><button type="submit" name="userID" value="<?php echo($userID['userID']);?>">Submit</button></td></tr>
          </table>
          </form>
        <?php
      };
      if(is_post_request())
      {
        $user=[];
        $user['firstName']=$_POST['firstName']??"";
        $user['secondName']=$_POST['secondName']??"";
        $user['email']=$_POST['email']??"";
        $user['user_name']=$_POST['user_name']??"";
        $user['admin']=$_POST['admin']??"";
        if($user['admin']==1)
        {
          dump_admin();
        }
        $user['banned']=$_POST['banned']??"";
        $user['userID']=$_POST['userID']??"";
        if(alter_user($user))
        {
          header('Location: manageUsers.php');
          exit();
        }
        else {}
      }
      ?>
