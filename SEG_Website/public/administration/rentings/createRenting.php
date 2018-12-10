<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
if(is_post_request())
{
  $args = [];
  $args['user_name'] = $_POST['username'];
  $args['gameid'] = $_POST['gameid'];
  $renting= new Renting($args);
  $result = $renting->create();
  if($result===true)
  {
    header('Location:manageAllRentings.php');
    exit();
  }
  else {
    $errors = $result;
  }
}
echo display_errors($errors); ?>
<form action="createRenting.php" method="post">
<table class="center output" style="text-align: center;">
<tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User name" name="username"/></td></tr>
<tr><th>Game ID</th><td><input  class ="searchForm" type="text" placeholder="Game ID" name="gameid"/></td></tr>
<tr><th></th><td><button type="submit">Submit</button></td></tr>
</table>
</form>
<?php require("../../shared/footer.php") ?>
