<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    // User Withdrawal
    if($_POST['action'] == "User Withdraw"){
      $id = $_GET['myUser_id'];
      $table = 'user';
      $link = 'Location:./user_user_page.php?myUser_id='.$id.'&result=diff';
      // Admin Withdrawal
    } else if ($_POST['action'] == "Admin Withdraw"){
      $id = $_GET['myAdmin_id'];
      $table = 'admin';
      $link = 'Location: ./admin_administrator_page.php?myAdmin_id='.$id.'&result=diff';
    }

    $sql = "SELECT * FROM $table where id = '$id'";
    $result = $mysqli->query($sql);
    $info = mysqli_fetch_assoc($result);
    // Check PW
    if($info['password'] != $_POST['password']){
      header($link);
    } else {
      $sql2 = "DELETE FROM $table WHERE id = '$id'";
      $result2 = $mysqli->query($sql2);
      header('Location: ../login_page.php?result=delete');
    }
  }
  ?>
