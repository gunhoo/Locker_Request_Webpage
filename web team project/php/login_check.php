<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    // Link to Find ID/PW Page
    if($_POST['action'] == "Find ID/PW"){
      header('Location: ./find_page.php');
      // Check whether ID or PW is empty
    } else if (($_POST['id'] == "") || ($_POST['password'] == "")){
      header('Location: ../login_page.php?result=empty');
      // Find User or Admin Info
    } else {
      $id = $_POST['id'];
      $password = $_POST['password'];
      // Check whether User or Admin
      if ($_POST['action'] == "User Login"){
        $table = 'user';
        $link = 'Location:./user_homepage_page.php?myUser_id='.$id;
      } else if ($_POST['action'] == "Admin Login"){
        $table = 'admin';
        $link = 'Location:./admin_homepage_page.php?myAdmin_id='.$id;
      }

      $sql = "SELECT * FROM $table where id = '$id'";
      $result = $mysqli->query($sql);
      // Check whether ID exists
      if(!isset($result)){
        header('Location: ../login_page.php?result=wrong');
      } else {
        $info = mysqli_fetch_assoc($result);
        // Check PW
        if($info['password']==$password){
          header($link);
        } else {
          header('Location: ../login_page.php?result=wrong');
        }
      }
    }
  }
?>
