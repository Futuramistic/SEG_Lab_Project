<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();

      $renting = Renting::find_by_id($_POST['id']??$_GET['id']??0);
      if($renting===false)
      {
        $renting= new Renting();
      }
      if(is_post_request())
      {
          $renting->delete()
          header('Location:manageAllRentings.php');
          exit();
      }
      ?>
      <form action="deleteRenting.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th><a href="manageAllRentings.php">Go Back</a></th></tr>
      <tr><th>Do you want to delete this game?</th></tr>
      <tr><th>ID</th><td><?php echo($renting->id);?></td></tr>
      <tr><th>Rent Date</th><td><?php echo($renting->rentDate);?></td></tr>
      <tr><th>Due Date</th><td><?php echo($renting->dueDate);?></td></tr>
      <tr><th>Return Date</th><td><?php echo($renting->returnDate);?></td></tr>
      <tr><th>User ID</th><td><?php echo($renting->userid);?></td></tr>
      <tr><th>Username</th><td><?php echo($renting->user_name);?></td></tr>
      <tr><th>Game Name</th><td><?php echo($renting->name);?></td></tr>
      <tr><th>Game ID</th><td><?php echo($renting->gameid);?></td></tr>
      <tr><th>Extensions</th><td><?php echo($renting->extentions);?></td></tr>
      <tr><th></th><td><button type="submit" name="id" value="<?php echo($renting->id);?>">Delete</button></td></tr>
      </table>
      </form>
      <?php require("../../shared/footer.php") ?>
