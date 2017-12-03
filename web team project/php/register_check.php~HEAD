<?php
  include "dbLogin.php";
  if(isset($_POST['action'])){
    if(($_POST['name'] != "") && ($_POST['id'] != "") && ($_POST['password'] != "") &&
        ($_POST['password_confirm'] != "") && ($_POST['phone_number'] != "") &&
        ($_POST['email'] != "") && ($_POST['student_number'] != "")){
      $id = $_POST['id'];
      $password = $_POST['password'];
      $confirm = $_POST['password_confirm'];
      $name = $_POST['name'];
      $phone_number = $_POST['phone_number'];
      $email = $_POST['email'];
      $student_number = $_POSt['student_number'];

      if($_POST['action'] == "user register"){
        $sql = "SELECT * FROM user where id='$id'";
        $id_result = $mysqli->query($sql);
        $sql2 = "SELECT * FROM user where student_number='$student_number'";
        $num_result = $mysqli->query($sql2);
        if(($id_result === FALSE) && ($num_result === FALSE) && ($password == $confirm)){
          $sql = "INSERT INTO user (id, password, name, phone_number, email, student_number)";
          $sql = $sql."VALUES('$id','$password','$name','$phone_number', '$email', '$student_number')";
          $result = $mysqli->query($sql);
          header('Location: ./login_page.php?result=success');
        } else {
          header('Location: ./user_register_page.php?result=wrong');
        }

      } else if($_POST['action'] == "admin register"){
        $sql = "SELECT * FROM admin where id='$id'";
        $id_result = $mysqli->query($sql);
        $sql2 = "SELECT * FROM admin where student_number='$student_number'";
        $num_result = $mysqli->query($sql2);
        if(($id_result === FALSE) && ($num_result === FALSE) && ($password == $confirm)){
          $account = $_POST['account'];
          $sql = "INSERT INTO admin (id, password, name, phone_number, email, student_number, account)";
          $sql = $sql."VALUES('$id','$password','$name','$phone_number', '$email', '$student_number', '$account')";
          $result = $mysqli->query($sql);
          header('Location: ./login_page.php?result=success');
        } else {
          header('Location: ./admin_register_page.php?result=wrong');
        }
      }
    } else {
        if($_POST['action'] == "user register"){
          header('Location: ./user_register_page.php?result=wrong');
        } else if($_POST['action'] == "admin register"){
          header('Location: ./admin_register_page.php?result=wrong');
        }
    }
  }
?>
