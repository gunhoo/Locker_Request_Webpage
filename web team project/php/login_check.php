<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    if($_POST['action'] == "Find ID/PW"){

    } else {
      $id = $_POST['id'];
      $password = $_POST['password'];
      if ($_POST['action'] == "User Login"){
        $sql = "SELECT * FROM user where id='$myUser_id'";
        $user = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($user);
        if(($result['id']==$id) && ($result['password']==$password)){
          header('Location: ./user_homepage.php?id='.$id);
        } else {
          header('Location: ./login_page.php?result=wrong');
        }
      } else if ($_POST['action'] == "Admin Login"){
        $sql = "SELECT * FROM admin where id='$myUser_id'";
        $admin = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($admin);
        if(($result['id']==$id) && ($result['password']==$password)){
          header('Location: ./admin_homepage.php?id='.$id);
        } else {
          header('Location: ./login_page.php?result=wrong');
        }
      }
    }
  }
?>
