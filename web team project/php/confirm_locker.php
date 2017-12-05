<?php
  include "dbLogin.php";

  $ary = array();
  for($i=0;$i<count($_POST['check']);$i++){
    $ary[$i] =  $_POST['check'][$i];
  }

  for($i=0; $i< count($_POST['check']); $i++){
    if(isset($_POST['btn'])){
      if($_POST['btn']=="Confirm"){
        $sql = "UPDATE locker SET status = 'used' WHERE locker_id = '$ary[$i]'";
      }else{ // ($_POST['btn']=="rejectBtn")
        $sql = "UPDATE locker SET status = 'empty',  user_id = NULL WHERE locker_id = '$ary[$i]'";
      }
    $mysqli->query($sql);
    }else{
      header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
    }
  }
  header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
?>
