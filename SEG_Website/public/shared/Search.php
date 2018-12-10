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
    width:auto;
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
      $platforms = Game::find_all_platforms();
      foreach($platforms as $platform)
      {
        echo ("<option>{$platform->platform}</option>");
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
  $formats = Game::find_all_fortmats();
  foreach($formats as $format)
  {
    echo ("<option>{$format->format}</option>");
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
    $PEGIS =Game::find_all_PEGI();
    foreach($PEGIS as $PEGI)
    {
      echo ("<option>{$PEGI->PEGI}</option>");
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
	<div class = "data" >
      <?php

        $args = [];
        $args['name']=$_GET['name'] ?? "";
        $args['developer']=$_GET['developer'] ?? "";
        $args['year']=$_GET['year'] ?? "";
        $args['minprice']=$_GET['minprice'] ?? "";
        $args['maxprice']=$_GET['maxprice'] ?? "";
        $args['platform']=$_GET['platform']?? "";
        $args['format']=$_GET['format'] ?? "";
        $args['PEGI']=$_GET['PEGI'] ?? "";
        $game = new Game($args);
        $games = $game->find_specific();
        if(isset($_GET['submit']))
        {
          echo('<table>');
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
          foreach($games as $gameResult)
          {
            echo("<tr>");
            echo("<td><image style='height: 150px;' src='".$gameResult->image."'/></td>");
            echo("<td>{$gameResult->name}</td>");
            echo("<td>{$gameResult->platform}</td>");
            echo("<td>{$gameResult->format}</td>");
            echo("<td>{$gameResult->developer}</td>");
            echo("<td>{$gameResult->year}</td>");
            echo("<td>{$gameResult->price}$</td>");
            echo("<td>{$gameResult->PEGI}</td>");
            echo("<td><a ");
            if(isset($gameResult->review)&&$gameResult->review!=""){echo(" target='_blank' ");}
            echo(" href='".$gameResult->review."'>Review</a></td>");
            if($gameResult->rented==0){echo("<td>Not Rented</td>");}
            else{echo("<td>Rented</td>");}
            echo("</tr>");
          }
          echo("</table>");
        }
      ?>
	</div>
	</html>


</html>

</body>
