<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
      $game = Game::find_by_id($_POST['id']??$_GET['id']??0);
      if($game===false)
      {
        $game= new Game();
      }
      if(is_post_request())
      {
        $result=$game->delete();
        header('Location:manageGames.php');
        exit();
      }
      ?>
<form action="deleteGame.php" method="post">
<table class="center output" style="text-align: center;">
<tr><th><a href="manageGames.php">Go Back</a></th></tr>
<tr><th>Do you want to delete this game?</th></tr>
<tr><th>Name</th><td><?php echo($game->name);?></td></tr>
<tr><th>Image URL</th><td><?php echo($game->image);?></td></tr>
<tr><th>Image URL</th><td><?php echo("<image style='height: 100px;' src='".$game->image."'/>");?></td></tr>
<tr><th>Review Site</th><td><?php echo($game->review);?></td></tr>
<tr><th>Platform</th><td><?php echo($game->platform);?></td></tr>
<tr><th>Format</th><td><?php echo($game->format);?></td></tr>
<tr><th>Developer</th><td><?php echo($game->developer);?></td></tr>
<tr><th>Year (YYYY-MM-DD)</th><td><?php echo($game->year);?></td></tr>
<tr><th>Price</th><td><?php echo ($game->price);?></td></tr>
<tr><th>PEGI</th><td><?php echo ($game->PEGI);?></td></tr>
<tr><th>Rented</th><td><?php if($game->rented==1){echo ("True");}else{echo("False");}?></td></tr>
<tr><th></th><td><button type="submit" name="id" value="<?php echo($game->id);?>">Delete</button></td></tr>
</table>
</form>
<?php require("../../shared/footer.php") ?>
