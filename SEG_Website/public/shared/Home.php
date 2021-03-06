<?php
require("../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require("navigation.php");
?>
<div class = "bannerinner">
      <div class = "bannercontent">
      <h2>Looking for a game?</h2>
      <form action="Search.php" method="GET">
			<input type="text" name="name" placeholder="Search for games">
			<button type="submit" name="submit" value="1" style="border-radius:10px;">&#128269;</button></form>
			<article>Our library contains a wide variety of games to rent - there is something for everyone!
			Search our library to find something for you.</article>
			</div>
		</div>
		</div>
<div class = "rowcontainer">
		<div class="row">
				<div class="column">
				<div class = "innersection">
					<strong>What we do</strong><p>
						The Computer Gaming Society has a collection of	computer games for a range of platforms, including current and older gaming consoles. Members
						of our society may rent these games for a limited time. Please view our <a href="Rules.php"  style="color: rgb(207,173,171)">society rules</a>
						for more information on renting games.
				</div>
			</div>
			<div class="column">
				<div class = "innersection">
					<article>
						<strong>How to rent a game</strong><p>
						You may browse our library here, however, members will need to visit our library to rent a game.
						Games which you have selected may not be available at the time of your visit.
				</article>
				</div>
			</div>
		</div>
	</div>
	<div class = "banner2">
	    <div class = "bannerinner2">
	      <div class = "bannercontent2">
				</div>
			</div>
			</div>
</div>
</body>
