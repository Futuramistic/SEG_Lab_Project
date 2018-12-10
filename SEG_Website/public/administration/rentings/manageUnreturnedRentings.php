<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
?>
    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="createRenting.php">Create New Renting</a></th></tr>
    <tr><th>Unreturned</th><th><a href="manageAllRentings.php">Show All</a></th></tr>
    <tr>
    <th>ID</th>
    <th>Rented Date</th>
    <th>Due Date</th>
    <th>Overdue</th>
    <th>User Name</th>
    <th>Game ID</th>
    <th>Game Name</th>
    <th>Extentions</th>
    <tr>
    <?php  $rentings = Renting::find_all_unreturned();
    foreach($rentings as $renting)
    {

      echo("<tr>");
      echo("<td>{$renting->id}</td>");
      echo("<td>{$renting->rentDate}</td>");
      echo("<td>{$renting->dueDate}</td>");
      echo("<td>");
      $now = date_create(date_default_timezone_get());
      $due = date_create($renting->dueDate);
      $diff = $due->diff($now);
      $show = $diff->format(" %r %a days");
      if(strpos($show , '-')===false && $diff->days >0){echo("Overdue by " . $show);}else{echo("No overdue");}
      echo("</td>");
      echo("<td>{$renting->user_name}</td>");
      echo("<td>{$renting->gameid}</td>");
      echo("<td>{$renting->name}</td>");
      echo("<td>{$renting->extentions}</td>");
      if($renting->extentions < 2){echo("<td><a href='extendRenting.php?id=".$renting->id."'>Extend</a></td>");}else{echo("<td></td>");}
      ?>
        <td><a class="action" href= "<?php echo('returnRenting.php?id='. $renting->id ); ?>">Return</a></td>
        <td><a class="action" href= "<?php echo('charge.php?id='. $renting->id ); ?>">Charge and return</a></td>
      <tr>
    <?php
    }
    ?>
    </table>
<?php require("../../shared/footer.php") ?>
