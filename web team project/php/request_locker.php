<?php
	include "dbLogin.php";
  $myUser_id = $_POST['myUser_id'];
  $building = $_POST['building'];
  $location = $_POST['location'];
  $locker_number = $_POST['locker_number'];
  //USERID검사해서 이미 신청한 DB가 존재하는지 여부 판단
  $d = "SELECT * FROM locker WHERE user_id='$myUser_id'";
	$checker = $mysqli->query($d);
  if(!mysqli_fetch_assoc($checker)){//존재하지 않으면
    $sql = "UPDATE locker SET status = 'ready', user_id='$myUser_id'
      WHERE building = '$building' AND location = '$location' AND locker_number = '$locker_number'";
    $mysqli->query($sql);
  }
  else{//존재하면
    echo "<script>alert(\"이미 신청하셨습니다.\");</script>";
  }

  header('Location: ./user_locker_request_page.php?myUser_id='.$myUser_id);
 ?>
