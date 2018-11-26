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
          margin-top: 20px;
          border-radius: 15px;
        	border:0.1px;
          background-color: white;
         	color:rgb(117,117,117);
          padding-top: 10px;
          padding-bottom: 10px;
          margin-bottom: 20px;
        }
        td, th{
          padding-left: 10px;
          padding-right: 10px;
          padding-top: 10px;
          vertical-align: middle;
          text-align: center;
        }

      </style>
      <?php
      if(is_post_request())
      {
        $game = [];
        $game['id'] = $_POST['id'];
        $game['name'] = $_POST['name'];
        $game['platform']= $_POST['platform'];
        $game['format']= $_POST['format'];
        $game['developer']= $_POST['developer'];
        $game['year']= $_POST['year'];
        $game['price']= $_POST['price'];
        $game['PEGI']= $_POST['PEGI'];
        $game['rented'] = $_POST['rented'];
        if(alter_game($game))
        {
          header('Location:manageGames.php');
          exit();
        }
        else {}
      }
      else {
        $gameID['id']=$_GET['id'];
        $result = find_games_by_id($gameID);
        $game = mysqli_fetch_assoc($result);
      }
      ?>
      <form action="editGame.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>Name</th><td><input  class ="searchForm" type="text" placeholder="Name" name="name" value="<?php echo($game['name'])?>"/></td></tr>
      <tr><th>Platform</th><td><input  class ="searchForm" type="text" placeholder="Platform" name="platform" value="<?php echo($game['platform'])?>"/></td></tr>
      <tr><th>Format</th><td><input  class ="searchForm" type="text" placeholder="Format" name="format" value="<?php echo($game['format'])?>"/></td></tr>
      <tr><th>Developer</th><td><input  class ="searchForm" type="text" placeholder="Developer" name="developer" value="<?php echo($game['developer'])?>"/></td></tr>
      <tr><th>Year</th><td><input  class ="searchForm" type="text" placeholder="Year" name="year" value="<?php echo($game['year'])?>"/></td></tr>
      <tr><th>Price</th><td><input  class ="searchForm" type="text" placeholder="Price" name="price" value="<?php echo($game['price'])?>"/></td></tr>
      <tr><th>Age</th><td><input  class ="searchForm" type="text" placeholder="Minimum Age" name="PEGI" value="<?php echo($game['PEGI'])?>"/></td></tr>
      <tr><th>Rented</th><td><input type="hidden" name="rented" value="0"/><input type="checkbox" name="rented"  <?php if($game['rented']==1) echo("checked")?> value="1"/></td></tr>
      <tr><th></th><td><button type="submit" name="id" value="<?php echo($gameID['id']);?>">Submit</button></td></tr>
      </table>
      </form>
     <?php
require("footer.php"); ?>