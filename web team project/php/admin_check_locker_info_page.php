<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if($myAdmin_id ==""){
		header('Location: ../login_page.php?result=no_id');
	}

	$sql = "SELECT building FROM locker GROUP BY building";
	$user = $mysqli->query($sql);
	if(isset($_GET['result'])){
		if($_GET['result'] == 'modify'){
			echo '<script>alert("사물함 정보가 수정되었습니다.")</script>';
		} else if($_GET['result'] == 'delete'){
			echo '<script>alert("사물함 삭제가 완료되었습니다.")</script>';
		} else if($_GET['result'] == 'exist'){
			echo '<script>alert("삭제 실패: 사물함을 사용하는 유저가 존재합니다.")</script>';
		}
	}
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
 	</form>
      <?php
        if(isset($_GET['building']) && isset($_GET['location'])){
		    	echo  '<ul id="info_list">
						<li>Locker number</li>
		        <li>Expiry Date</li>
		        <li>Rental Fee</li>
		        <li>Remittance Account</li>';
            $building = $_GET['building'];
            $location = $_GET['location'];

						$sql2 = "SELECT expiry_date, rental_fee, remittance_account
						 FROM locker WHERE building='$building' AND location='$location'";
          	$user2 = $mysqli->query($sql2);
            $lockerCount = mysqli_fetch_assoc($user2);
						$expiry_date = $lockerCount['expiry_date'];
						$rental_fee = $lockerCount['rental_fee'];
						$remittance_account = $lockerCount['remittance_account'];

            $sql2 = "SELECT building, location, count(location) as locker_count
						 FROM locker WHERE building='$building' AND location='$location' GROUP BY location";
          	$user2 = $mysqli->query($sql2);
            $locker= mysqli_fetch_assoc($user2);

						echo '<form action=".\modify_locker.php" method="POST" name="myForm">';
						echo '<input type="hidden" name="myAdmin_id" value="'.$myAdmin_id.'">';
			      echo '<input type="hidden" name="building" value="'.$building.'">';
			      echo '<input type="hidden" name="location" value="'.$location.'">';
						echo '<li class="info">'.$locker['locker_count'].'</li>';
            echo '<li class="info"> <input  type=text name = expiry_date value='.$expiry_date.'></li>';
            echo '<li class="info"> <input  type=text name = rental_fee value='.$rental_fee.'></li>';
            echo '<li class="info"> <input  type=text name = remittance_account value='.$remittance_account.'></li>';
            echo '</ul>';
						echo '<li class="title_info">'.$building.'&nbsp;&nbsp;|&nbsp;&nbsp;'.$location.'&nbsp;&nbsp; Locker Info </li>';
						echo '<input id="modifyBtn" type="submit" name="action" value="modify">';
						echo '<input id="deleteBtn" type="submit" name="action" value="delete">';
						echo '</form>';
					}
         ?>
  </article>
</body>
</html>
