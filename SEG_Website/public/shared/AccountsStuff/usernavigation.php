<div class = "page" style ="float: left; width: 20%; margin-right: 2%; margin-left: 2%" id="accountnav">
  <div class = "pagecontent">
    <li style ="text-align: left; padding-bottom: 25px; list-style-type: none; border-bottom: 1px solid rgb(224,224,224);">   <a style ="color: rgb(110,110,110);" href = "AccountInfo.php"> Personal Information</a></li>
    <li style ="text-align: left; padding-bottom: 25px; list-style-type: none; border-bottom: 1px solid rgb(224,224,224);">   <a style ="color: rgb(110,110,110);" href = "AccountRentedGames.php"> Rented games</a></li>
    <?php
    if($_SESSION['admin']==1||$_SESSION['administration']==1)
    {
      echo('<li style ="text-align: left; padding-bottom: 25px; list-style-type: none; border-bottom: 1px solid rgb(224,224,224);"><a style ="color: rgb(110,110,110);" href = "manageData.php"> Manage Data </a></li>');
      echo('<li style ="text-align: left; padding-bottom: 25px; list-style-type: none; border-bottom: 1px solid rgb(224,224,224);"><a style ="color: rgb(110,110,110);" href = "seeReports.php"> See Reports </a></li>');

    }
    ?>
</div>
</div>
