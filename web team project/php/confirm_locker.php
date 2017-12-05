<?php
  include "dbLogin.php";
  echo hi2;

  for($i=0;$i<count($_POST['check']);$i++){
    $ary[$i] = $_POST[check][$i]);
  }
  for($i=0;$i<count($ary);$i++){
    echo "$ary[$i]";
  }


  /*for($i=0; $i< count($checkNum); $i++){
    if(isset($_POST['check'])){
      if($_POST['check']=="Confirm"){
        $sql = "UPDATE locker SET status = 'used' WHERE locker_id = '$_POST['check']'";
      }else{ // ($_POST['btn']=="rejectBtn")
        $sql = "UPDATE locker SET status = 'empty' WHERE locker_id = '$_POST['check']'";
      }
    $mysqli->query($sql);
    }else{
      header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
    }
  }*/
  #header('Location: ./admin_request_list_page.php?myAdmin_id='.$_GET['myAdmin_id']);
?>
