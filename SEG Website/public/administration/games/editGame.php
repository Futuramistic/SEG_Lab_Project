<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
      if(is_post_request())
      {
        $game = [];
        $game['id'] = $_POST['id'] ??0;
        $game['name'] = $_POST['name'] ?? "";
        $game['platform']= $_POST['platform'] ?? "";
        $game['format']= $_POST['format'] ?? "";
        $game['developer']= $_POST['developer'] ?? "";
        $game['year']= $_POST['year'] ?? "";
        $game['price']= $_POST['price'] ?? "";
        $game['PEGI']= $_POST['PEGI'] ?? "";
        $game['rented'] = $_POST['rented'] ?? "";
        $game['image'] = $_POST['image']??"";
        $game['review'] = $_POST['review']??"";
        $result = alter_game($game);
        if($result===true)
        {
          header('Location:manageGames.php');
          exit();
        }
        else {
          $errors = $result;
        }
      }
      else {
        $gameID['id']=$_GET['id']??0;
        $game = find_game_by_id($gameID);
      }
      echo display_errors($errors); ?>
      <form action="editGame.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>Name</th><td><input  class ="searchForm" type="text" placeholder="Name" name="name" value="<?php echo($game['name'])?>"/></td></tr>
      <tr><th>Platform</th><td><input  class ="searchForm" type="text" placeholder="Platform" name="platform" value="<?php echo($game['platform'])?>"/></td></tr>
      <tr><th>Format</th><td><input  class ="searchForm" type="text" placeholder="Format" name="format" value="<?php echo($game['format'])?>"/></td></tr>
      <tr><th>Developer</th><td><input  class ="searchForm" type="text" placeholder="Developer" name="developer" value="<?php echo($game['developer'])?>"/></td></tr>
      <tr><th>Year</th><td><input  class ="searchForm" type="text" placeholder="Year" name="year" value="<?php echo($game['year'])?>"/></td></tr>
      <tr><th>Price</th><td><input  class ="searchForm" type="text" placeholder="Price" name="price" value="<?php echo($game['price'])?>"/></td></tr>
      <tr><th>Age</th><td><input  class ="searchForm" type="text" placeholder="Minimum Age" name="PEGI" value="<?php echo($game['PEGI'])?>"/></td></tr>
      <tr><th>Image</th><td><input  class ="searchForm" type="text" placeholder="Image URL" name="image" value="<?php echo($game['image'])?>"/></td></tr>
      <tr><th>Review</th><td><input  class ="searchForm" type="text" placeholder="Review URL" name="review" value="<?php echo($game['review'])?>"/></td></tr>
      <tr><th>Rented</th><td><input type="hidden" name="rented" value="0"/><input type="checkbox" name="rented"  <?php if($game['rented']==1) echo("checked")?> value="1"/></td></tr>
      <tr><th></th><td><button type="submit" name="id" value="<?php echo($game['id']);?>">Submit</button></td></tr>
      </table>
      </form>
<?php require("../../shared/footer.php") ?>