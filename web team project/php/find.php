<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    // ID Find
    if ($_POST['action'] == "ID Find"){
      // Find the User
      if (($_POST['name'] != "") && ($_POST['email'] != "")){
        $sql = "SELECT * FROM user where name = '$name' AND email = '$email'";
        $result = $mysqli->query($sql);
        // If fount the User
        if(!isset($result)){
          header('Location: ./find_page.php?result=incorrect');
        } else {
          $info = mysqli_fetch_assoc($result);
          header('Location: ./find_page.php?result=id_find&id='.$info['id']);
        }
      } else {
        header('Location: ./find_page.php?result=empty');
      }
      // PW Find
    } else if ($_POST['action'] == "PW Find"){
      // Find the User
      if (($_POST['id'] != "") && ($_POST['name'] != "")
          || ($_POST['email'] == "")){
        $id = $_POST['id'];
        $sql = "SELECT * FROM user where id = '$id'";
        $result = $mysqli->query($sql);
        // If fount the User
        if(!isset($result)){
          header('Location: ./find_page.php?result=incorrect');
        } else {
          $info = mysqli_fetch_assoc($result);
          header('Location: ./find_page.php?result=pw_find&password='.$info['password']);
        }
      } else {
        header('Location: ./find_page.php?result=empty');
      }
    }
  }
?>
