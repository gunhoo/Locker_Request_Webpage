<?php
  include "dbLogin.php";

  $sql = "UPDATE locker SET status = 'ready' WHERE locker_id = '$_POST['locker_id']'";
  if(isset($_POST['btn'])){
    if($_POST['btn']=="Confirm"){
      $sql = "UPDATE locker SET status = 'used' WHERE locker_id = '$_POST['locker_id']'";
      echo '<p> hi </p>';
    }else{ // ($_POST['btn']=="rejectBtn")
      $sql = "UPDATE locker SET status = 'empty' WHERE locker_id = '$_POST['locker_id']'";
      echo '<p> hi2 </p>';
    }
  $mysqli->query($sql);
  }else{
    header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
  }
  header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
?>
