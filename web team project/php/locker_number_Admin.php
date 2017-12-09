<?php
  $myAdmin_id = $_POST['myAdmin_id'];
  if($myAdmin_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
	include "dbLogin.php";
  $building = $_POST['building'];
  $location = $_POST['location'];
	$sql = "SELECT locker_number FROM locker WHERE building='$building' AND location='$location' GROUP BY locker_number";
	$user = $mysqli->query($sql);
?>

<!DOCTYPE html>
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
    <form action=".\admin_check_locker_info_page.php" method="get" name="myForm">
      <input type="hidden" name="building" value="<?=$building?>">
      <input type="hidden" name="location" value="<?=$location?>">
      <input type="hidden" name="myAdmin_id" value="<?=$myAdmin_id?>">
      <select class="selector" name="locker_number">
        <option value="" disabled selected>Locker Number</option>
        <?php
  				while($locker_number = mysqli_fetch_assoc($user)){
              echo '<option value="'.$locker_number['locker_number'].'">'.$locker_number['locker_number'].'</option>';
          }
        ?>
      </select>
      <input id="reqBtn2" type="submit" value="Request">
    </form>

  </article>
</body>

</html>
