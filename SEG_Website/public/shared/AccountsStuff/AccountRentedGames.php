<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet-accountinfo.css");
require("../navigation.php");
require("../../stylesheets/style.html");
if(!check_login())
{
	header("Location: ../Login.php");
	exit();
}
?>
<div class ="pagecontainer" style ="margin: 0 auto; width: 100%">
<?php require("usernavigation.php")?>
				<div class = "page" style ="float:left; width:74%">
					<div class = "pagecontent">
							<h2 style ="text-align: center; padding-bottom: 10px;">Rented Games</h2>
							<div  style ="text-align: center;">
							<table>
							<tr>
							<th>Image</th><th>Game</th><th>Renting Date</th><th>Due Date</th><th>Extensions</th>
							</tr>
							<?php $rents = Renting::find_current_rentings_by_userid($_SESSION['id']);
							foreach($rents as $renting)
							if(!isset($renting->returnDate)){
							echo("<tr>");
							echo("<td><img style='height: 100px;' src='{$renting->image}'></td>");
							echo("<td>{$renting->name}</td>");
				      echo("<td>{$renting->rentDate}</td>");
				      echo("<td>{$renting->dueDate}</td>");
				      echo("<td>{$renting->extentions}</td>");
							echo("</tr>");
							}
							?>
						</table>
						</div>
							</div>
					</div>

			</div>
		</div>


</body>
</html>
