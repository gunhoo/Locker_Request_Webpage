<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    $id = $_POST['myAdmin_id'];
    $building = $_POST['building'];
    $location = $_POST['location'];
    $expiry_date = $_POST['expiry_date'];
    $rental_fee = $_POST['rental_fee'];
    $remittance_account = $_POST['remittance_account'];

    if($_POST['action'] == "modify"){
      $sql = "UPDATE locker
              SET expiry_date = '$expiry_date',
                  rental_fee = '$rental_fee',
                  remittance_account = '$remittance_account'
              WHERE building='$building' AND location='$location'";
      $link = 'Location:./admin_check_locker_info_page.php?myAdmin_id='.$id.'&result=modify';
    } else if($_POST['action'] == "delete"){
      // 사물함에 유저가 존재하는지 검색
      $sql = "SELECT * FROM locker WHERE user_id IS NOT NULL";
      $result = $mysqli->query($sql);
      $user = mysqli_fetch_assoc($result);

      // 해당 사물함에 유저가 존재하는 경우
      if($user['locker_id']){
        $link = 'Location:./admin_check_locker_info_page.php?myAdmin_id='.$id.'&result=exist';
      } else {
        $sql = "DELETE FROM locker
                WHERE building='$building' AND location='$location'";
        $result = $mysqli->query($sql);
        $link = 'Location:./admin_check_locker_info_page.php?myAdmin_id='.$id.'&result=delete';
      }
    }
    $result = $mysqli->query($sql);
    header($link);
  }
  ?>
