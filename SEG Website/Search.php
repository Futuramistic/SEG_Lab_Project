<?php
require("database.php");
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
  th.heading{
    text-align: center;
    font-size: 19px;
    font-style: italic;
  }
  a {
    text-decoration: none;
  }
</style>
<div style="text-align:center; ">
<form action="Search.php" method="get">
<table class="center" style="text-align: auto;">
<tr>
  <td><article class = "innersection"> Game name: </article></td>
  <td><input  class ="searchForm" type="text" placeholder="Name" name="name" /></td>
  <td><article class = "innersection"> Developer: </article></td>
  <td><input  class ="searchForm"  type="text" placeholder="Developer" name="developer" /></td>
</tr>
<tr>
  <td><article class = "innersection"> Production year: </article></td>
  <td><input  class ="searchForm"  type="text" placeholder="Year" name="year" /></td>
  <td><article class = "innersection"> Price: </article></td>
  <td><input  class ="searchForm"  type="text" placeholder="Price" name="price" /></td>
</tr>
<tr>
  <td><article class = "innersection"> Platform: </article></td>
  <td><select class="search" name="platform">
  <option></option>
  <?php
  $platforms = find_all_games_platforms();
  while($platform = mysqli_fetch_assoc($platforms))
  {
    echo ("<option>{$platform['platform']}</option>");
  }
  ?>
  </select></td>
  <td><article class = "innersection"> Format: </article></td>
  <td><select class="search" name="format">
  <option></option>
  <?php
  $formats = find_all_games_fortmats();
  while($format = mysqli_fetch_assoc($formats))
  {
    echo ("<option>{$format['format']}</option>");
  }
  ?>
  </select></td>
  <td><article class = "innersection"> PEGI: </article></td>
  <td><select class="search" name="PEGI">
  <option></option>
  <?php
  $PEGIS = find_all_games_PEGI();
  while($PEGI = mysqli_fetch_assoc($PEGIS))
  {
    echo ("<option>{$PEGI['PEGI']}</option>");
  }
  ?>
  </select></td>
</tr>
<table>
<button class="search" type="submit" name="submit" value="1">Search!</button>
</form>
</div>
<?php

  $game = [];
  $game['name']=$_GET['name'] ?? "";
  $game['developer']=$_GET['developer'] ?? "";
  $game['year']=$_GET['year'] ?? "";
  $game['price']=$_GET['price'] ?? "";
  $game['platform']=$_GET['platform']?? "";
  $game['format']=$_GET['format'] ?? "";
  $game['PEGI']=$_GET['PEGI'] ?? "";
  $result = find_game($game);
  if(isset($_GET['submit']))
  {
    echo('<table class="center output" style="text-align: center;">');
    echo('<tr style="text-align: center;"><th class="heading">Available Games</th></tr>');
    echo("<tr>");
    echo("<th>Image</th>");
    echo("<th>Name</th>");
    echo("<th>Platform</th>");
    echo("<th>Format</th>");
    echo("<th>Developer</th>");
    echo("<th>Year</th>");
    echo("<th>Price</th>");
    echo("<th>Age</th>");
    echo("<th>Review</th>");
    echo("<th>Rented?</th>");
    echo("</tr>");
    while($game = mysqli_fetch_assoc($result))
    {
      echo("<tr>");
      echo("<td><image style='height: 100px;' src='".$game['image']."'/></td>");
      echo("<td>{$game['name']}</td>");
      echo("<td>{$game['platform']}</td>");
      echo("<td>{$game['format']}</td>");
      echo("<td>{$game['developer']}</td>");
      echo("<td>{$game['year']}</td>");
      echo("<td>{$game['price']}$</td>");
      echo("<td>{$game['PEGI']}</td>");
      echo("<td><a ");
      if(isset($game['review'])&&$game['review']!=""){echo(" target='_blank' ");}
      echo(" href='".$game['review']."'>Review</a></td>");
      if($game['rented']==0){echo("<td>Not Rented</td>");}
      else{echo("<td>Rented/td>");}
      echo("</tr>");
    }
    echo("</table>");
  }
  mysqli_free_result($result);
?>
<?php require("footer.php") ?>
