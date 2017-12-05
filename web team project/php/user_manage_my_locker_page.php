<?php
  $myUser_id = $_GET['myUser_id'];
  if($myUser_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
 ?>

<?php
	include "dbLogin.php";
  $myUser_id = $_GET['myUser_id'];
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
				<li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
	        Homepage</a></li>
	      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
	        Locker Request</a></li>
	      <li id="clicked_menu"><a href=".\user_manage_my_locker_page.php?myUser_id=<?=$myUser_id?>">
	        Manage My Locker</a></li>
	      <li><a href=".\user_user_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
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
    <?php
      if($result = mysqli_fetch_assoc($locker_number)){
		echo '<div>
			<form>
				<ul id="result">
					<li>State</li>
					<li>Building</li>
					<li>Location</li>
					<li>Locker Number</li>
					<li>Expiry Date</li>
					<li>Rental Fee</li>
					<li>Remittance Account</li>
				</ul>
			</form>
		</div>
		<div id="show">
			<form>
				<ul id="show">'."\n";
							echo '<li><input class="info_list" type="text" name="state" value="'.$result['status'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="building"  value="'.$result['building'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="location"  value="'.$result['location'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="locker_number"  value="'.$result['locker_number'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="expiry_date"  value="'.$result['expiry_date'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="rental_fee"  value="'.$result['rental_fee'].'"></li>'."\n";
							echo '<li><input class="info_list" type="text" name="remittance_account"  value="'.$result['remittance_account'].'"></li>'."\n";
				echo '</ul>
			</form>
		</div>'."\n";}else{
      echo '<p>There is no locker you have requested for</p>'."\n";
    }
    ?>
  </article>
</body>

</html>
