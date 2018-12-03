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

        }
        a {
          text-decoration: none;
        }
      </style>
      <?php
      if(is_post_request())
      {
        $game = [];
        $option =[];
        $game['name'] = $_POST['name'];
        $game['platform']= $_POST['platform'];
        $game['format']= $_POST['format'];
        $game['developer']= $_POST['developer'];
        $game['year']= $_POST['year'];
        $game['price']= $_POST['price'];
        $game['PEGI']= $_POST['PEGI'];
        $game['rented'] = $_POST['rented'];
        $game['image'] = $_POST['image']??"";
        $game['review'] = $_POST['review']??"";
        if(isset($game['image'])&&$game['image']!="")
        {
          $option['image']=true;
        }
        if(isset($game['review'])&&$game['review']!="")
        {
          $option['review']=true;
        }
        if(add_game($game,$option))
        {
          header('Location:manageGames.php');
          exit();
        }
        else {}
      }
      ?>
      <form action="createGame.php" method="post">
      <table class="center output" style="text-align: center;">
      <tr><th>Name</th><td><input  class ="searchForm" type="text" placeholder="Name" name="name"/></td></tr>
      <tr><th>Platform</th><td><input  class ="searchForm" type="text" placeholder="Platform" name="platform"/></td></tr>
      <tr><th>Format</th><td><input  class ="searchForm" type="text" placeholder="Format" name="format"/></td></tr>
      <tr><th>Developer</th><td><input  class ="searchForm" type="text" placeholder="Developer" name="developer"/></td></tr>
      <tr><th>Year</th><td><input  class ="searchForm" type="text" placeholder="Year" name="year"/></td></tr>
      <tr><th>Price</th><td><input  class ="searchForm" type="text" placeholder="Price" name="price"/></td></tr>
      <tr><th>Age</th><td><input  class ="searchForm" type="text" placeholder="Minimum Age" name="PEGI"/></td></tr>
      <tr><th>Image</th><td><input  class ="searchForm" type="text" placeholder="Image URL" name="image"/></td></tr>
      <tr><th>Review</th><td><input  class ="searchForm" type="text" placeholder="Review URL" name="review"/></td></tr>
      <tr><th>Rented</th><td><input type="hidden" name="rented" value="0"/><input type="checkbox" name="rented"value="1"/></td></tr>
      <tr><th></th><td><button type="submit">Submit</button></td></tr>
      </table>
      </form>
   <?php
require("footer.php"); ?>

