<?php
require("database.php"); ?>
<html>
<head>
<title>The Computer Gaming Society</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>


<body>
<div class = "banner">
<?php
require("navigation.php");
  ?>
      <style>
        input.searchForm{
          width: 400px;
          margin-left:30px;
          margin-right: 10px;
        }
        table.center {
          margin-left:auto;
          margin-right:auto;
          justify-content: center;
        }
        button.search{
        	border-radius: 30px;
        	border:0.1px;
        	background-color: white;
        	color:rgb(117,117,117);
        	font-size: 19px;
          width: 400px;
          margin-top: 10px;
          margin-bottom: 30px;
        }
        select.search{
          border-radius: 30px;
          border:0.1px;
          background-color: white;
          color:rgb(117,117,117);
        	font-size: 19px;
        }
        table.output{
          border-radius: 15px;
        	border:0.1px;
          background-color: white;
         	color:rgb(117,117,117);
        }
        td, th{
          padding-top: 10px;
          padding-left: 10px;
          padding-right: 10px;
          text-align: center;
        }
        a {
          text-decoration: none;
        }
      </style>
      <?php
      if(is_post_request())
      {
        $game=[];
        $game['id']=$_POST['id'];
        $result=delete_game($game);
        if($result)
        {
          header('Location:manageGames.php');
          exit();
        }
      }
      else {
        $gameID['id']=$_GET['id'];
        $result = find_games_by_id($gameID);
        $game = mysqli_fetch_assoc($result);
      }
      ?>
<form action="deleteGame.php" method="post">
<table class="center output" style="text-align: center;">
<tr><th><a href="manageGames.php">Go Back</a></th></tr>
<tr><th>Do you want to delete this game?</th></tr>
<tr><th>Name</th><td><?php echo($game['name']);?></td></tr>
<tr><th>Image URL</th><td><?php echo($game['image']);?></td></tr>
<tr><th>Image URL</th><td><?php echo("<image style='height: 100px;' src='".$game['image']."'/>");?></td></tr>
<tr><th>Review Site</th><td><?php echo($game['review']);?></td></tr>
<tr><th>Platform</th><td><?php echo($game['platform']);?></td></tr>
<tr><th>Format</th><td><?php echo($game['format']);?></td></tr>
<tr><th>Developer</th><td><?php echo($game['developer']);?></td></tr>
<tr><th>Year (YYYY-MM-DD)</th><td><?php echo($game['year']);?></td></tr>
<tr><th>Price</th><td><?php echo ($game['price']);?></td></tr>
<tr><th>PEGI</th><td><?php echo ($game['PEGI']);?></td></tr>
<tr><th>Rented</th><td><?php if($game['rented']==1){echo ("True");}else{echo("False");}?></td></tr>
<tr><th></th><td><button type="submit" name="id" value="<?php echo($gameID['id']);?>">Delete</button></td></tr>
</table>
</form>
   <?php
require("footer.php"); ?>

