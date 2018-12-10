<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
?>
    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="createGame.php">Create New Game</a></th></tr>
    <tr>
    <th>ID        </th>
    <th>Image     </th>
    <th>Name      </th>
    <th>Platform  </th>
    <th>Format    </th>
    <th>Developer </th>
    <th>Year      </th>
    <th>Price     </th>
    <th>Age       </th>
    <th>Review    </th>
    <th>Rented    </th>
    <tr>
    <?php  $games = Game::find_all();
    foreach($games as $game )
    {
      echo("<tr>");
      echo("<td>{$game->id}</td>");
      echo("<td><image style='height: 100px;' src='".$game->image."'/></td>");
      echo("<td>{$game->name}</td>");
      echo("<td>{$game->platform}</td>");
      echo("<td>{$game->format}</td>");
      echo("<td>{$game->developer}</td>");
      echo("<td>{$game->year}</td>");
      echo("<td>{$game->price}</td>");
      echo("<td>{$game->PEGI}</td>");
      echo("<td><a ");
      if(isset($game->review)&&$game->review!=""){echo(" target='_blank' ");}
      echo(" href='".$game->review."'>Review</a></td>");
      if($game->rented==1){echo("<td>True</td>");} else{echo("<td>False</td>");}
      ?>
        <td><a class="action" href= "<?php echo('editGame.php?id='. $game->id ); ?>">Edit</a></td>
        <td><a class="action" href= "<?php echo('deleteGame.php?id='. $game->id ); ?>">Delete</a></td>
      <tr>
    <?php
    }
    ?>
    </table>

<?php require("../../shared/footer.php") ?>
