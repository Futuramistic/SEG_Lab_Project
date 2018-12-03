<?php
require("database.php");
require("navigation.php");
?>
<?php
unset($_SESSION['admin']);
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['banned']);
header('Location: Login.php');
?>
<?php require("footer.php")?>
