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
$user = User::find_by_id($_SESSION['id']);
?>
<div class ="pagecontainer" style ="margin: 0 auto; width: 100%">
			<?php require("usernavigation.php")?>
				<div class = "page" style ="float:left; width:74%">
					<div class = "pagecontent">
							<h2 style ="text-align: center; padding-bottom: 10px;">Personal Information</h2>
								<form action = "AccountInfo.php">
								<div class = "searchpanel" id="loginMain">
								<table>
								<div class = "paneldivision">
								<tr><th>Status: </th>
									<td><?php
									$str="";
									if($_SESSION['admin']==1)
									{
											$str.="Admin ";
									}
									elseif ($_SESSION['administration']==1)
									{
										$str.="Office ";
									}
									else
									{
										$str.="Member ";
									}

									if($_SESSION['banned']==1)
									{
											$str.="Banned ";
									}
									echo($str);
									?></td>
								</tr>
								</div>
								<div class = "paneldivision">
								<tr><th>First Name</th><td><input type="text" placeholder="First name" name="firstname" disabled value = <?php echo($user->firstName)?> ></td></tr>
								</div>
								<div class = "paneldivision">
								<tr><th>Last Name</th><td><input type="text" placeholder="Last name" name="lastname" disabled value = <?php echo($user->secondName)?>></td></tr>
								</div>
								<div class = "paneldivision">
								<tr><th>User Name</th><td><input type="text" placeholder="Username" name="username" disabled value = <?php echo($user->user_name)?>></td></tr>
								</div>
								<div class = "paneldivision">
								<tr><th>Email</th><td><input type="text" placeholder="Email" name="Email" disabled value =<?php echo($user->email)?>></td></tr>
								</div>
								</table>
								</div>
								</form>
							</div>
					</div>

			</div>


</body>
</html>
