<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if($myAdmin_id ==""){
		header('Location: ./login_page.php?result=no_id');
	}

	$sql = "SELECT building FROM locker GROUP BY building";
	$user = $mysqli->query($sql);

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
		<form action=".\locationAdmin.php" method="post" name="myForm">
      <input type="hidden" name="myAdmin_id" value="<?=$myAdmin_id?>">
      <select class="selector" name="building">
        <option value="" disabled selected>Building</option>
        <?php
  				while($building = mysqli_fetch_assoc($user)){
            echo '<option value="'.$building['building'].'">'.$building['building'].'</option>';
          }
        ?>
      </select>

      <ul id="info_list">
				<input id="chkBtn" type="submit" value="Check">
      </ul>
      <?php
        if(isset($_GET['building']) && isset($_GET['location']) && isset($_GET['locker_number'])){
    echo  '<ul id="info_list">
        <li>Expiry Date</li>
        <li>Rental Fee</li>
        <li>Remittance Account</li>';
            $building = $_GET['building'];
            $location = $_GET['location'];
            $locker_number = $_GET['locker_number'];
            $sql2 = "SELECT * FROM locker WHERE building='$building' AND location='$location' AND locker_number='$locker_number'";
          	$user = $mysqli->query($sql2);
            $locker = mysqli_fetch_assoc($user);
            echo '<li class="info">'.$locker['expiry_date'].'</li>';
            echo '<li class="info">'.$locker['rental_fee'].'</li>';
            echo '<li class="info">'.$locker['remittance_account'].'</li>';
            echo '</ul>';
          } else{

          }
         ?>

    </form>

    <?php
    if(isset($_GET['building']) && isset($_GET['location']) && isset($_GET['locker_number'])){
      $building = $_GET['building'];
      $location = $_GET['location'];
      $locker_number = $_GET['locker_number'];
      $myAdmin_id = $_GET['myAdmin_id'];
      echo '<ul id="info_list">';
      echo '<input type="hidden" name="myAdmin_id" value="'.$myAdmin_id.'">';
      echo '<input type="hidden" name="building" value="'.$building.'">';
      echo '<input type="hidden" name="location" value="'.$location.'">';
      echo '<input type="hidden" name="locker_number" value="'.$locker_number.'">';
      echo '<input id="reqBtn" href=".\admin_check_locker_info_page.php?myAdmin_id=<?=$myAdmin_id?>" type="button" value="Back">';
      echo '</ul>';

    }
    ?>
  </article>
</body>
</html>
