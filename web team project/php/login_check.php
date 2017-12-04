<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    // to Find ID/PW Page
    if($_POST['action'] == "Find ID/PW"){
      header('Location: ./find_page.php');
      // check whether ID or PW is null
    } else if($_POST['id'] != "" && $_POST['password'] != ""){
      $id = $_POST['id'];
      $password = $_POST['password'];

      // Check User Login
      if ($_POST['action'] == "User Login"){
        $sql = "SELECT * FROM user where id = '$id'";
        $user = $mysqli->query($sql);
        // Check ID & PW
        if($user != FALSE) {
          $result = mysqli_fetch_assoc($user);
          // PW 일치 시 로그인
          if($result['password']==$password){
            header('Location: ./user_homepage_page.php?myUser_id='.$id);
          } else {
            header('Location: ./login_page.php?result=wrong2');
          }
        } else {
          header('Location: ./login_page.php?result=wrong3');
        }
        // Check Admin Login
      } else if ($_POST['action'] == "Admin Login"){
        $sql = "SELECT * FROM admin where id ='$id'";
        $admin = $mysqli->query($sql);
        // Check ID & PW
        if($admin != FALSE) {
          $result = mysqli_fetch_assoc($admin);
          // PW 일치 시 로그인
          if($result['password']==$password){
            header('Location: ./admin_homepage_php.php?myAdmin_id='.$id);
          } else {
            header('Location: ./login_page.php?result=wrong');
          }
        } else {
          header('Location: ./login_page.php?result=wrong');
        }
      }
    } else {
      header('Location: ./login_page.php?result=null');
    }
  }
?>
