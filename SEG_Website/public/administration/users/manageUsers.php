<?php
require("../../../private/initialize.php");
createHeader("The Computer Gaming Society","stylesheets/stylesheet.css");
require('../../shared/navigation.php');
require("../../stylesheets/style.html");
check_staff();
?>
    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="createUser.php">Create New User</a></th></tr>
    <tr>
    <th>ID        </th>
    <th>First Name      </th>
    <th>Last Name  </th>
    <th>E-mail </th>
    <th>User Name      </th>
    <th>Fees      </th>
    <th>Admin    </th>
    <th>Administration     </th>
    <th>Banned      </th>
    <tr>
    <?php  $users = User::find_all();
    foreach($users as $user)
    {
      echo("<tr>");
      echo("<td>$user->userID</td>");
      echo("<td>$user->firstName</td>");
      echo("<td>$user->secondName</td>");
      echo("<td>$user->email</td>");
      echo("<td>$user->user_name</td>");
      echo("<td>$user->fees</td>");
      if($user->admin==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      if($user->administration==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      if($user->banned==1){echo("<td>True</td>");}else{echo("<td>False</td>");}
      if($user->banned==1){echo("<td>Banned from: $user->banDate</td>");}else{echo("<td></td>");}
      ?>
      <td><a class="action" href= "<?php echo('editUser.php?userID='. $user->userID ); ?>">Edit</a></td>
      <td><a class="action" href= "<?php echo('deleteUser.php?userID='. $user->userID ); ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
    </table>

<?php require("../../shared/footer.php") ?>
