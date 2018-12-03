<div class = "nav">
  <div class = "innernav">
    <div class="navtext">
      <li style="font-size: 19; font-weight: 900;">The Computer Gaming Society</li>
      <li style = "float: right"><a href="<?php echo url_for('/shared/Login.php');?>">My Account</a></li>
      <li style = "float: right"><a href="<?php echo url_for('/shared/Search.php');?>">Search</a></li>
      <li style = "float: right"><a href="<?php echo url_for('/shared/Home.php');?>">Home</a></li>
			<?php if(isset($_SESSION['username']))
			{
				echo('<li style = "float: right"><a href="'.url_for('/shared/Logout.php').'">Log Out</a></li>');
				echo('<li style = "float: right">LOGGED AS:'.$_SESSION['username'].' </li>');
			}?>
    </div>
  </div>
  </div>
