<?php
require("../../private/initialize.php");
unset($_SESSION['admin']);
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['banned']);
header('Location: Login.php');
require("footer.php");
?>
