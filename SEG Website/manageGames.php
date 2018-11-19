<?php require("navigation.php");
      require("database.php")?>
      <style>
        input.searchForm{
          width: 400px;
          margin-left:30px;
          margin-right: 10px;
        }
        table.center {
          margin-left:auto;
          margin-right:auto;
          justify-content: center;
        }
        button.search{
        	border-radius: 30px;
        	border:0.1px;
        	background-color: white;
        	color:rgb(117,117,117);
        	font-size: 19px;
          width: 400px;
          margin-top: 10px;
          margin-bottom: 30px;
        }
        select.search{
          border-radius: 30px;
          border:0.1px;
          background-color: white;
          color:rgb(117,117,117);
        	font-size: 19px;
        }
        table.output{
          border-radius: 15px;
        	border:0.1px;
          background-color: white;
         	color:rgb(117,117,117);
        }
        td, th{
          padding-top: 10px;
          padding-left: 10px;
          padding-right: 10px;

        }
        a {
          text-decoration: none;
        }
      </style>


    <table class="center output" style="text-align: center;">
    <tr><th><a class="action" href="">Create New Game</a></th></tr>
    <tr>
    <th>ID        </th>
    <th>Name      </th>
    <th>Platform  </th>
    <th>Format    </th>
    <th>Developer </th>
    <th>Year      </th>
    <th>Price     </th>
    <th>Age       </th>
    <th>Rented    </th>
    <tr>
    <?php  $result = find_all_games();
    while($game = mysqli_fetch_assoc($result))
    {
      echo("<tr>");
      echo("<td>{$game['id']}</td>");
      echo("<td>{$game['name']}</td>");
      echo("<td>{$game['platform']}</td>");
      echo("<td>{$game['format']}</td>");
      echo("<td>{$game['developer']}</td>");
      echo("<td>{$game['year']}</td>");
      echo("<td>{$game['price']}</td>");
      echo("<td>{$game['PEGI']}</td>");
      if($game['rented']==1){echo("<td>True</td>");} else{echo("<td>False</td>");}
      ?>
        <td><a class="action" href= "<?php echo('editGame.php?id='. $game['id'] ); ?>">Edit</a></td>
        <td><a class="action" href= "<?php echo('deleteGame.php?id='. $game['id'] ); ?>">Delete</a></td>
      <tr>
    <?php
    }
    ?>
    </table>

<?php require("footer.php") ?>
