<?php
require("../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet-account.css");
require("navigation.php");
require("../stylesheets/style.html");
?>
    <div class = "banner">
        <div class = "bannerinner">
          <?php
          if(!check_login())
        	{
        		header("Location: Login.php");
        		exit();
        	}
          //Display error box;
          $error=resolve_errors();
          if($error!==false){
            $errors=$error;
          }
          echo display_login_errors($errors);
          ?>
            <div class = "bannercontent">
      <h2>Account Settings</h2>
			</div>
      <style>
	h3 {
    padding: 20px;
    margin-right: 450px;
    margin-left: 450px;
    text-align: center;
    }
    h2{
        text-align: center;
    }
    button {
        text-align: center;
    }
    </style>
	<h2 style = >This is an overview of your account where you can check if you have any overdue items,
	outstanding fees, currently rented items and membership status.</h2>
	<h3 style = "border: 1px solid black;">Your current membership status is: </h3>
	<h3 style = "border: 1px solid black;">Here is a list of your current overdue items: </h3>
	<h3 style = "border: 1px solid black;">Here are all the items that you are currently renting: </h3>
	<h3 style = "border: 1px solid black;">Outstanding fees: </h3>

</div>
</div>
</body>
</html>
