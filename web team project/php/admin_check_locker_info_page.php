<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if($myAdmin_id ==""){
		header('Location: ./login_page.php?result=no_id');
	}

	$sql = "SELECT building FROM locker GROUP BY building";
	$user = $mysqli->query($sql);
	$sql2 = "SELECT location FROM locker GROUP BY location";
	$user2 = $mysqli->query($sql2);
	$sql3 = "SELECT locker_number FROM locker GROUP BY locker_number";
	$user3 = $mysqli->query($sql3);

?>

<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_admin_check_locker_info.css">
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
				<li><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">Homepage</a></li>
				<li id="clicked_menu"><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage Lockers</a></li>
				<li><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage User</a></li>
				<li><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">Administrator Page</a></li>
				<li><a href=".\admin_homepage_page.php?myAdmin_id=">Logout</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Add New Locker</a></li>
      <li><a href=".\admin_request_list_page.php?myAdmin_id=<?=$myAdmin_id?>">Request List</a></li>
			<li><a href=".\admin_used_list_page.php?myAdmin_id=<?=$myAdmin_id?>">Used List</a></li>
      <li id="clicked_sub_menu"><a href=".\admin_check_locker_info_page.php?myAdmin_id=<?=$myAdmin_id?>">Check Locker Info</a></li>
    </ul>
  </nav>
  <article>
    <h1>Check Locker Info</h1>
    <form action="index.html" method="post">
			<input type="hidden" name="buildinginput" >

			<select class="selector" name="building">
				<option value="" >Building</option>
				<?php
					while($building = mysqli_fetch_assoc($user)){
						echo '<option value="'.$building['building'].'">'.$building['building'].'</option>';
					}
				?>
			</select>



			<select class="selector" name="location">
				<option value="" >Location</option>
				<?php
				while($location = mysqli_fetch_assoc($user2)){
					echo '<option value="'.$location['location'].'">'.$location['location'].'</option>';
				}
				?>
			</select>

			<select class="selector" name="locker_number">
				<option value="" >Locker Number</option>
				<?php
				while($locker_number = mysqli_fetch_assoc($user3)){
					echo '<option value="'.$locker_number['locker_number'].'">'.$locker_number['locker_number'].'</option>';
				}
				?>
			</select>



			      <ul id="info_list">
			        <li>Expiry Date</li>
			        <li>Rental Fee</li>
			        <li>Remittance Account</li>
			        <?php
			          if(isset($_GET['building']) && isset($_GET['location']) && isset($_GET['locker_number'])){
			            $building = $_GET['building'];
			            $location = $_GET['location'];
			            $locker_number = $_GET['locker_number'];
			            $sql2 = "SELECT * FROM locker WHERE building='$building' AND location='$location' AND locker_number='$locker_number'AND status='empty'";
			          	$user = $mysqli->query($sql2);
			            $locker = mysqli_fetch_assoc($user);
									
			            echo '<li class="info">'.$locker['expiry_date'].'</li>';
			            echo '<li class="info">'.$locker['rental_fee'].'</li>';
			            echo '<li class="info">'.$locker['remittance_account'].'</li>';
			          } else{
			            echo '<li class="info">정보없음</li>';
			            echo '<li class="info">정보없음</li>';
			            echo '<li class="info">정보없음</li>';
			          }
			         ?>
			      </ul>
      <input id="reqBtn" type="button" onclick = "addLockerjava()" value="Confirm">
    </form>
  </article>
</body>
