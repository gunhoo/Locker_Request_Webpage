<?php
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$myUser_id=$_GET['myUser_id'];
	$sql = "SELECT * FROM locker WHERE user_id LIKE '$myUser_id'";
	$locker_number = $mysqli->query($sql);
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
				<li><a href=".\user_home_page.php">
	        Homepage</a></li>
	      <li ><a href=".\user_locker_request_page.php">
	        Locker Request</a></li>
	      <li id="clicked_menu"><a href=".\user_locker_info_page.php">
	        Manage My Locker</a></li>
	      <li><a href=".\user_info_page.php">User Page</a></li>
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
		<div>
			<form>
				<ul id="result">
					<li>State</li>
					<li>Building</li>
					<li>Location</li>
					<li>Locker Number</li>
					<li>Expiry Date</li>
					<li>Rental Fee</li>
					<li>Remittance Bank</li>
					<li>Remittance Account</li>
				</ul>
			</form>
		</div>
		<div id="show">
			<form>
				<ul id="show">
					<?php
						if($result = mysqli_fetch_assoc($locker_number)){
							echo '<li><input class="info_list" type="text" name="state" value="'.$result['status'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="building"  value="'.$result['building'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="location"  value="'.$result['location'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="locker_number"  value="'.$result['locker_number'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="expiry_date"  value="'.$result['expiry_date'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="rental_fee"  value="'.$result['rental_fee'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="remittance_bank"  value="'.$result['remittance_bank'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="remittance_account"  value="'.$result['remittance_accout'].'"></li>'."\n";
						}
					?>
				</ul>
			</form>
		</div>
  </article>
</body>

</html>
