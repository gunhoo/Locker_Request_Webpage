<?php
  $myUser_id = $_GET['myUser_id'];
  if($myUser_id ==""){
    header('Location: ../login_page.php?result=no_id');
  }
	include "dbLogin.php";
	$sql = "SELECT building FROM locker WHERE status = 'empty' GROUP BY building";
	$user = $mysqli->query($sql);
  if(isset($_GET['result'])){
		if($_GET['result'] == 'requested'){
			echo '<script>alert("사물함이 신청되었습니다. 입금 확인 시 사물함 등록이 완료됩니다.")</script>';
		} else if($_GET['result'] == 'exist'){
			echo '<script>alert("이미 사물함을 신청하셨습니다.")</script>';
		}
	}
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
				<li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
	        Homepage</a></li>
	      <li id="clicked_menu"><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
	        Locker Request</a></li>
	      <li ><a href=".\user_manage_my_locker_page.php?myUser_id=<?=$myUser_id?>">
	        Manage My Locker</a></li>
	      <li><a href=".\user_user_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
        <li><a href=".\admin_homepage_page.php?myUser_id=">Logout</a></li>
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
    <form action=".\location.php" method="post" name="myForm">
      <input type="hidden" name="myUser_id" value="<?=$myUser_id?>">
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
            $sql2 = "SELECT * FROM locker WHERE building='$building' AND location='$location' AND locker_number='$locker_number'AND status='empty'";
          	$user = $mysqli->query($sql2);
            $locker = mysqli_fetch_assoc($user);
            echo '<li class="info">'.$locker['expiry_date'].'</li>';
            echo '<li class="info">'.$locker['rental_fee'].'</li>';
            echo '<li class="info">'.$locker['remittance_account'].'</li>';
            echo '</ul>';
            echo '<li class="title_info">'.$building.'&nbsp;&nbsp;|&nbsp;&nbsp;'.$location.'&nbsp;&nbsp;|&nbsp; no. '.$locker_number.'&nbsp; Locker Info </li>';

          } else{

          }
         ?>

    </form>

    <?php
    if(isset($_GET['building']) && isset($_GET['location']) && isset($_GET['locker_number'])){
      $building = $_GET['building'];
      $location = $_GET['location'];
      $locker_number = $_GET['locker_number'];
      $myUser_id = $_GET['myUser_id'];
      echo '<form action=".\request_locker.php" method="POST" name="myForm2">';
      echo '<ul id="info_list">';
      echo '<input type="hidden" name="myUser_id" value="'.$myUser_id.'">';
      echo '<input type="hidden" name="building" value="'.$building.'">';
      echo '<input type="hidden" name="location" value="'.$location.'">';
      echo '<input type="hidden" name="locker_number" value="'.$locker_number.'">';
      echo '<input id="reqBtn" type="submit" value="Request">';
      echo '</ul>';
      echo '</form>';
    }
    ?>
  </article>
</body>
</html>
