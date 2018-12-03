<?php
require("../../private/initialize.php");
createHeader("Home Page","stylesheets/stylesheet-search.css");
require("navigation.php");
?>
  <style>
  td,tr,th{
    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
  }
  table {
    margin-left:auto;
    margin-right: auto;
    justify-content: center;
    text-align: center;
  }
  </style>
    <div class = "bannerinner">
      <div class = "bannercontent">
				<h2>&#128269; Search, Rent, Game</h2>
			</div>
		</div>
		</div>
		<div class = "banner2">
		</div>
    <form action="Search.php" method="get">
		<div class = "searchpanel">
			<div class = "paneldivision">
			<input  class ="searchForm" type="text" placeholder="Name" name="name" />
		</div>
		<div class = "paneldivision">
      <select class="search" placeholder="Platform" name="platform">
      <option value="" disabled selected>Platform</option>
      <?php
      $platforms = find_all_games_platforms();
      while($platform = mysqli_fetch_assoc($platforms))
      {
        echo ("<option>{$platform['platform']}</option>");
      }
      ?>
      </select>
	</div>
  <div class = "paneldivision">
	<input  class ="searchForm"  type="text" placeholder="Developer" name="developer" />
  </div>
  <div class = "paneldivision">
  <select class="search" name="format">
  <option value="" disabled selected>Format</option>
  <?php
  $formats = find_all_games_fortmats();
  while($format = mysqli_fetch_assoc($formats))
  {
    echo ("<option>{$format['format']}</option>");
  }
  ?>
  </select>
  </div>

  <div class = "paneldivision">
  <input  class ="searchForm"  type="text" placeholder="Year" name="year" />
  </div>
	<div class = "paneldivision">
    <select class="search" name="PEGI">
    <option value="" disabled selected>Age Rating (PEGI)</option>
    <?php
    $PEGIS = find_all_games_PEGI();
    while($PEGI = mysqli_fetch_assoc($PEGIS))
    {
      echo ("<option>{$PEGI['PEGI']}</option>");
    }
    ?>
    </select>
		</div>
		<div class = "paneldivision" style ="height: 39px;">
			<input type="text" placeholder="Min Price" name="minprice" style="margin-bottom: 4px; width: 141px; float: left; font-size: 15px;">
		   <article style="float: left; padding-left: 4px">_</article>
			<input type="text" placeholder="Max Price" name="maxprice" style="margin-left: 4px; width:141px; float: left; font-size: 15px; ">

		</div>
				<button class="search" type="submit" name="submit" value="1">Search!</button>
	</div>
</form>
	<div class = "data">
      <?php

        $game = [];
        $game['name']=$_GET['name'] ?? "";
        $game['developer']=$_GET['developer'] ?? "";
        $game['year']=$_GET['year'] ?? "";
        $game['minprice']=$_GET['minprice'] ?? "";
        $game['maxprice']=$_GET['maxprice'] ?? "";
        $game['platform']=$_GET['platform']?? "";
        $game['format']=$_GET['format'] ?? "";
        $game['PEGI']=$_GET['PEGI'] ?? "";
        $result = find_games($game);
        if(isset($_GET['submit']))
        {
          echo('<table style="text-align: center;">');
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
            echo("<td><image style='height: 150px;' src='".$game['image']."'/></td>");
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
            else{echo("<td>Rented</td>");}
            echo("</tr>");
          }
          echo("</table>");
        }
        mysqli_free_result($result);
      ?>
	</div>
	</html>


</html>

</body>
