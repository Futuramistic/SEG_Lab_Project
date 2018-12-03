<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
      if(is_post_request())
      {
        $game = [];
        $option =[];
        $game['name'] = $_POST['name']?? "";
        $game['platform']= $_POST['platform']?? "";
        $game['format']= $_POST['format']?? "";
        $game['developer']= $_POST['developer']?? "";
        $game['year']= $_POST['year']?? "";
        $game['price']= $_POST['price']?? "";
        $game['PEGI']= $_POST['PEGI']?? "";
        $game['rented'] = $_POST['rented']?? "";
        $game['image'] = $_POST['image']??"";
        $game['review'] = $_POST['review']??"";
        if(is_present($game['image']))
        {
          $option['image']=true;
        }
        if(is_present($game['review']))
        {
          $option['review']=true;
        }
        $result = add_game($game,$option);
        if($result===true)
        {
          header('Location:manageGames.php');
          exit();
        }
        else {
          $errors = $result;
        }
      }
      echo display_errors($errors); ?>
      <form action="createGame.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>Name</th><td><input  class ="searchForm" type="text" placeholder="Name" name="name" value='<?php echo($_POST['name']??"")?>'/></td></tr>
      <tr><th>Platform</th><td><input  class ="searchForm" type="text" placeholder="Platform" name="platform" value='<?php echo($_POST['platform']??"")?>'/></td></tr>
      <tr><th>Format</th><td><input  class ="searchForm" type="text" placeholder="Format" name="format" value='<?php echo($_POST['format']??"")?>'/></td></tr>
      <tr><th>Developer</th><td><input  class ="searchForm" type="text" placeholder="Developer" name="developer" value='<?php echo($_POST['developer']??"")?>'/></td></tr>
      <tr><th>Year</th><td><input  class ="searchForm" type="text" placeholder="Year" name="year" value='<?php echo($_POST['year']??"")?>'/></td></tr>
      <tr><th>Price</th><td><input  class ="searchForm" type="text" placeholder="Price" name="price" value='<?php echo($_POST['price']??"")?>'/></td></tr>
      <tr><th>Age</th><td><input  class ="searchForm" type="text" placeholder="Minimum Age" name="PEGI" value='<?php echo($_POST['PEGI']??"")?>'/></td></tr>
      <tr><th>Image</th><td><input  class ="searchForm" type="text" placeholder="Image URL" name="image" value='<?php echo($_POST['image']??"")?>'/></td></tr>
      <tr><th>Review</th><td><input  class ="searchForm" type="text" placeholder="Review URL" name="review" value='<?php echo($_POST['review']??"")?>'/></td></tr>
      <tr><th>Rented</th><td><input type="hidden" name="rented" value="0"/><input type="checkbox" name="rented"value="1"/></td></tr>
      <tr><th></th><td><button type="submit">Submit</button></td></tr>
      </table>
      </form>
      <?php require("../../shared/footer.php") ?>
