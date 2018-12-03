<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
      if(is_post_request())
      {
          $user=[];
          $options=[];
          $user['firstName']=$_POST['firstName']??"";
          $user['secondName']=$_POST['secondName']??"";
          $user['email']=$_POST['email']??"";
          $user['user_name']=$_POST['user_name']??"";
          $user['admin']=$_POST['admin']??"";
          if($user['admin']==1)
          {
            dump_admin();
          }
          $user['fees']=$_POST['fees']??"0.00";
          $user['administration']=$_POST['administration']??"";
          $user['banned']=$_POST['banned']??"";
          $user['userID']=$_POST['userID']??0;
          $user['password1']=$_POST['password1']??"";
          $user['password2']=$_POST['password2']??"";
          $user['password']=$_POST['password1']??"";
          if(is_present($user['password1'])||is_present($user['password2']))
          {
            $options['password']=true;
          }
          $result = alter_user($user,$options);
          if($result===true)
          {
            header('Location:manageUsers.php');
            exit();
          }
          else {
            $errors = $result;
          }

      }
        $userID = [];
        $userID['userID']=$_GET['userID'] ?? "";
        $result = find_user_by_id($userID);
        $user =  mysqli_fetch_assoc($result);
        echo display_errors($errors); ?>
          <form action="editUser.php?userID=<?php echo($_GET['userID']) ?>" method="post">
          <table class="center output" style="text-align: center;">
          <tr><th>First Name</th><td><input  class ="searchForm" type="text" placeholder="First Name" name="firstName" value="<?php echo($user['firstName']);?>"/></td></tr>
          <tr><th>Last Name</th><td><input  class ="searchForm" type="text" placeholder="Second Name" name="secondName" value="<?php echo($user['secondName']);?>"/></td></tr>
          <tr><th>E-mail</th><td><input  class ="searchForm" type="text" placeholder="E-Mail" name="email" value="<?php echo($user['email']);?>"/></td></tr>
          <tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User Name" name="user_name" value="<?php echo($user['user_name']);?>"/></td></tr>
          <tr><th>Fees</th><td><input  class ="searchForm" type="text" placeholder="Fees" name="fees" value="<?php echo($user['fees']);?>"/></td></tr>
          <tr><th>Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password1"/></td></tr>
          <tr><th>Confirm Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password2"/></td></tr>
          <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']=="1"){ ?>
          <tr><th>Admin</th><td><input type="hidden" name="admin" value="0"/><input type="checkbox" name="admin" value="1" <?php if($user['admin']==1){echo ("checked");}?>/></td></tr>
          <tr><th>Administration</th><td><input type="hidden" name="administration" value="0"/><input type="checkbox" name="administration" <?php if($user['administration']==1){echo ("checked");}?> value="1"/></td></tr>
          <tr><th>Banned</th><td><input type="hidden" name="banned" value="0"/><input type="checkbox" name="banned"value="1" <?php if($user['banned']==1){echo ("checked");}?>/></td></tr>
          <tr><th></th><td><button type="submit" name="userID" value="<?php echo($userID['userID']);?>">Submit</button></td></tr> <?php } ?>
          </table>
          </form>
        <?php
      ?>
<?php require("../../shared/footer.php") ?>
