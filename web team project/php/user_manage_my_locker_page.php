<?php
  $myUser_id = $_GET['myUser_id'];
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_user_locker_info.css">
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
      <li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
        Homepage</a></li>
      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
        Locker Request</a></li>
      <li id="clicked_menu"><a href=".\user_manage_my_locker_page.php?myUser_id=<?=$myUser_id?>">
        Manage My Locker</a></li>
      <li><a href=".\user_info_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li>My Locker Info</li>
    </ul>
  </nav>
  <article>
    <h1>My Locker Info</h1>
    <form action="index.html" method="post">
      <ul id="info_list">
        <li>State</li>
        <li>Building</li>
        <li>Location</li>
        <li>Locker Number</li>
        <li>Expiry Date</li>
        <li>Rental Fee</li>
        <li></li>
        <li>Remittance Account</li>

        <li><input class="checkInfo" type="text" name="state"  value="입금 대기 중"></li>
        <li><input class="checkInfo" type="text" name="building"  value="208관"></li>
        <li><input class="checkInfo" type="text" name="location"  value="4층"></li>
        <li><input class="checkInfo" type="text" name="locker_number"  value="35"></li>

        <li><input class="checkInfo" type="text" name="expiry_date" value="2010-11-01" placeholder="(일)"></li>
        <li><input class="checkInfo" type="text" name="rental_fee" value="5000원" placeholder="(원)"></li>
        <li></li>
        <li><input class="checkInfo" type="text" name="remittance_account"  value="우리 1002-443-492296"></li>
</ul>
    </form>
  </article>
</body>

</html>
