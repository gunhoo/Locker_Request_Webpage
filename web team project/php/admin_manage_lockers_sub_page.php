<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if($myAdmin_id ==""){
		header('Location: ./login_page.php?result=no_id');
	}
  $sql = "INSERT INTO locker (locker_id, locker_number, building, location, expiry_date, rental_fee, remittance_account, user_id, status) VALUES(NULL,'2','$_GET[building]','$_POST[location]','$_POST[expiry_date]','$_POST[rental_fee]','$_POST[account]','$myAdmin_id','$_POST[col]') ";
  mysqli_query($mysqli, $sql);
  header('Location: ./admin_manage_lockers_page.php?myAdmin_id='.$myAdmin_id);

?>
