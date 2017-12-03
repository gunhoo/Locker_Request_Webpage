<?php
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$sql = "SELECT building, count(building) FROM locker GROUP BY building";
	$user = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_user_request.css">
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
				<li><a href=".\user_home_page.php">
	        Homepage</a></li>
	      <li id="clicked_menu"><a href=".\user_locker_request_page.php">
	        Locker Request</a></li>
	      <li ><a href=".\user_locker_info_page.php">
	        Manage My Locker</a></li>
	      <li><a href=".\user_info_page.php">User Page</li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li id="clicked_sub_menu">Locker Request</li>
    </ul>
  </nav>
  <article>
    <h1>Locker Information</h1>
    <form action="index.html" method="post">
      <select class="selector" name="building" onchange="setLocation(this, 'location', 'locker_number')">
        <option value="" disabled selected>Building</option>
        <?php
  				while($location = mysqli_fetch_assoc($user)){
            echo '<option value="'.$location['building'].'">'.$location['building'].'</option>';
          }
        ?>
      </select>
      <select class="selector" name="location">
        <option value="" disabled selected>Location</option>
      </select>
      <select class="selector" name="locker_number">
        <option value="" disabled selected>Locker Number</option>
      </select>
      <ul id="info_list">
        <li>Expiry Date</li>
        <li>Rental Fee</li>
        <li>Remittance Account</li>
        <li class="info">2018-01-01</li>
        <li class="info">5000 (원)</li>
        <li class="info">우리 1002-443-492296</li>
      </ul>
      <input id="reqBtn" type="button" value="Request">
    </form>

  </article>
</body>

</html>
