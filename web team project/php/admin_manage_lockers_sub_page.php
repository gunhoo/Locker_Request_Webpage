<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if($myAdmin_id ==""){
		header('Location: ./login_page.php?result=no_id');
	}
	$building = $_GET['building'];
	$location = $_GET['location'];
	$query = "SELECT * FROM locker WHERE building='$building' AND location='$location'";
	$data = mysqli_query($mysqli, $query);
	$table_count = mysqli_num_rows($data);



	for($i = $table_count; $i < $table_count + $_GET['row']*$_GET['col']; $i++){
		$sql = "INSERT INTO locker (locker_id, locker_number, building, location, expiry_date, rental_fee, remittance_account, user_id, status) VALUES(NULL,'$i'+1,'$_GET[building]','$_GET[location]','$_GET[expiry_date]','$_GET[rental_fee]','$_GET[account]',NULL,'empty') ";
  mysqli_query($mysqli, $sql);
}
  header('Location: ./admin_manage_lockers_page.php?myAdmin_id='.$myAdmin_id);

?>
