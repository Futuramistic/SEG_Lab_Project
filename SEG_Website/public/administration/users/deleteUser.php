<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
      $user = User::find_by_id($_POST['userID']??$_GET['userID']??0);
      if($user===false)
      {
        $user = new User();
      }
      if(is_post_request())
      {
        $user->delete();
          header('Location:manageUsers.php');
          exit();
      }
      ?>
      <form action="deleteUser.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th><a href="manageUsers.php">Go Back</a></th></tr>
      <tr><th>Do you want to delete this user?</th></tr>
      <tr><th>First Name</th><td><?php echo($user->firstName);?></td></tr>
      <tr><th>Last Name</th><td><?php echo($user->secondName);?></td></tr>
      <tr><th>Password</th><td><?php echo($user->password);?></td></tr>
      <tr><th>E-mail</th><td><?php echo($user->email);?></td></tr>
      <tr><th>User Name</th><td><?php echo($user->user_name);?></td></tr>
      <tr><th>Fees</th><td><?php echo($user->fees."$");?></td></tr>
      <tr><th>Admin</th><td><?php if($user->admin==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th>Administration</th><td><?php if($user->administration==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th>Banned</th><td><?php if($user->banned==1){echo ("True");}else{echo("False");}?></td></tr>
      <tr><th></th><td><button type="submit" name="userID" value="<?php echo($user->userID);?>">Delete</button></td></tr>
      </table>
      </form>
<?php require("../../shared/footer.php") ?>
