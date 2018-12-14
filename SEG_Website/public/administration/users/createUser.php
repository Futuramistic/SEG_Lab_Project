<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
      check_staff();
      $user = new User();
      if(is_post_request())
      {
        $args=[];
        $args['firstName']=$_POST['firstName']??NULL;
        $args['secondName']=$_POST['secondName']??NULL;
        $args['password1']=$_POST['password1']??NULL;
        $args['password2']=$_POST['password2']??NULL;
        $args['bare_password']=$_POST['password1']??NULL;
        $args['email']=$_POST['email']??NULL;
        $args['user_name']=$_POST['user_name']??NULL;
        if(isset($_POST['option']))
        {
          $args['administration']=$_POST['administration']??"0";
          $args['admin']=$_POST['admin']??"0";
          if($args['admin']==1)
          {
            User::dump_admin();
          }
          $args['banned']=$_POST['banned']??"0";
          if($args['banned']==1)
          {
            $args['banDate']=date_create(date("Y-m-d H:i:s"))->format("Y-m-d H:i:s");
          }
        }
        else {
          $args['administration']="0";
          $args['admin']="0";
          $args['banned']="0";
          $args['banDate']=NULL;
        }
        $user = new User($args);
        $user->merge_attributes($args);
        $result = $user->create();
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
      $user->display("createUser.php")?>

<?php require("../../shared/footer.php") ?>
