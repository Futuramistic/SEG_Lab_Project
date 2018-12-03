<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
      if(is_post_request())
      {
        $user=[];
        $user['firstName']=$_POST['firstName']??"";
        $user['secondName']=$_POST['secondName']??"";
        $user['password1']=$_POST['password1']??"";
        $user['password2']=$_POST['password2']??"";
        $user['password']=$_POST['password1']??"";
        $user['email']=$_POST['email']??"";
        $user['user_name']=$_POST['user_name']??"";
        $user['administration']=$_POST['administration']??"";
        $user['admin']=$_POST['admin']??"";
        if($user['admin']==1)
        {
          dump_admin();
        }
        $user['banned']=$_POST['banned']??"";
        $result=add_user($user);
        if($result===true)
        {
          header('Location:manageUsers.php');
          exit();
        }
        else {
          $errors = $result;
        }
      }
      echo display_errors($errors); ?>

      <form action="createUser.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>First Name</th><td><input  class ="searchForm" type="text" placeholder="First Name" name="firstName"/></td></tr>
      <tr><th>Last Name</th><td><input  class ="searchForm" type="text" placeholder="Second Name" name="secondName"/></td></tr>
      <tr><th>Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password1"/></td></tr>
      <tr><th>Confirm Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password2"/></td></tr>
      <tr><th>E-mail</th><td><input  class ="searchForm" type="text" placeholder="E-Mail" name="email"/></td></tr>
      <tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User Name" name="user_name"/></td></tr>
      <tr><th>Admin</th><td><input type="hidden" name="admin" value="0"/><input type="checkbox" name="admin" value="1"/></td></tr>
      <tr><th>Administration</th><td><input type="hidden" name="administration" value="0"/><input type="checkbox" name="administration" value="1"/></td></tr>
      <tr><th>Banned</th><td><input type="hidden" name="banned" value="0"/><input type="checkbox" name="banned"value="1"/></td></tr>
      <tr><th></th><td><button type="submit">Submit</button></td></tr>
      </table>
      </form>
<?php require("../../shared/footer.php") ?>
