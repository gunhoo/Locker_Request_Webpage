<?php
  include "dbBLogin.php";
  if(isset($_POST['action'])){
    if(($_POST['name'] != "") && ($_POST['id'] != "") && ($_POST['password'] != "") &&
        ($_POST['password_confirm'] != "") && ($_POST['phone_number'] != "") && ($_POST['email'] != "")
        ($_POST['student_number'] != "")){
      $id = $_POST['id'];
      $password = $_POST['password'];
      $confirm = $_POST['password_confirm'];
      $student_number = $_POSt['student_number'];

      if($_POST['action'] == "user register"){
        $sql = "SELECT * FROM user where id='$id'";
        $id_result = $mysqli->query($sql);
        $sql2 = "SELECT * FROM user where student_number='$student_number'";
        $num_result = $mysqli->query($sql2);
        if(($id_result === FALSE) && ($num_result === FALSE) && ($password == $confirm)){
          $sql = "INSERT INTO user (name, phoneNumber, email, notes)";
          $sql = $sql."values('$name','$phoneNumber','$email','$notes')";
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
