<?php
require("../../../private/initialize.php");
createHeader("Login Page","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
?>
    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="createRenting.php">Create New Renting</a></th></tr>
    <tr><tH>All rentings</th><th><a href="manageUnreturnedRentings.php">Show Unreturned</a></th></tr>
    <tr>
    <th>ID</th>
    <th>Rented Date</th>
    <th>Due Date</th>
    <th>Return Date</th>
    <th>User Name</th>
    <th>Game ID</th>
    <th>Game Name</th>
    <th>Extentions</th>
    <tr>
    <?php  $result = find_all_rentings();
    while($renting = mysqli_fetch_assoc($result))
    {

      echo("<tr>");
      echo("<td>{$renting['id']}</td>");
      echo("<td>{$renting['rentDate']}</td>");
      echo("<td>{$renting['dueDate']}</td>");
      echo("<td>");
      if(isset($renting['returnDate']))echo($renting['returnDate']);else echo("");
      echo("</td>");
      echo("<td>{$renting['user_name']}</td>");
      echo("<td>{$renting['gameid']}</td>");
      echo("<td>{$renting['name']}</td>");
      echo("<td>{$renting['extentions']}</td>");
      ?>
        <td><a class="action" href= "<?php echo('deleteRenting.php?id='. $renting['id'] ); ?>">Delete</a></td>
      <tr>
    <?php
    }
    ?>
    </table>

<?php require("../../shared/footer.php") ?>
