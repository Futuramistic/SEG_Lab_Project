<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
      $user = User::find_by_id($_GET['userID'] ?? NULL);
      if($user===false)
      {
        $user = new User();
      }
      if(is_post_request())
      {
        $value=false;
          $args=[];
          $args['firstName']=$_POST['firstName']??NULL;
          $args['secondName']=$_POST['secondName']??NULL;
          $args['fees']=$_POST['fees']??"0.00";
          $args['email']=$_POST['email']??NULL;
          $args['user_name']=$_POST['user_name']??NULL;
          $args['administration']=$_POST['administration']??0;
          $args['admin']=$_POST['admin']??0;
          if($args['admin']==1)
          {
              User::dump_admin();
          }
          $args['banned']=$_POST['banned'];
          $args['password1']=$_POST['password1'];
          $args['password2']=$_POST['password2'];
          if(isset($args['password1'])&&isset($args['password2']))
          {
            $args['bare_password']=$_POST['password1'];
          }
          $user->merge_attributes($args);
          $result=$user->update();
          if($result===true)
          {
            header('Location:manageUsers.php');
            exit();
          }
          else {
            $errors = $result;
          }

      }
      echo display_errors($errors);
      $user->display("editUser.php?userID=");
      require("../../shared/footer.php") ?>
