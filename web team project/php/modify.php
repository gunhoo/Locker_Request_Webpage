<?php
  include "dbLogin.php";

  if(isset($_POST['action'])){
    // User Modify

    if($_POST['action'] == "User Modify"){
      $id = $_GET['myUser_id'];
      $subject = 'user';
      $link = 'Location:./user_user_page.php?myUser_id='.$id.'&result=';

      // Admin Modify
    } else if ($_POST['action'] == "Admin Modify"){
      $id = $_GET['myAdmin_id'];
      $subject = 'admin';
      $link = 'Location: ./admin_administrator_page.php?myUser_id='.$id.'&result=';
    }

    $password = $_POST['password'];
    $confirm = $_POST['password_confirm'];

    // Check PW error
    if(($password != null) && ($confirm != null) && ($password === $confirm)){
      // Update
      $name = $_POST['name'];
      $phone_number = $_POST['phone_number'];
      $email = $_POST['email'];

      $sql = "UPDATE $subject
              SET password='$password',
                  name='$name',
                  phone_number='$phone_number',
                  email='$email'
              WHERE id='$id'";
      $result = $mysqli->query($sql);
      header($link.'modified');
    }
    else {
      header($link.'diff');
    }
  }
  ?>
