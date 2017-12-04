<?php
  include "dbLogin.php";
  if(isset($_POST['action'])){
    // Check whether value is empty
    if(($_POST['name'] == "") || ($_POST['id'] == "") || ($_POST['password'] == "") ||
        ($_POST['password_confirm'] == "") || ($_POST['phone_number'] == "") ||
        ($_POST['email'] == "") || ($_POST['student_number'] == "")){
      // when any value is empty
      if($_POST['action'] == "user register"){
        header('Location: ./user_register_page.php?result=empty');
      } else if($_POST['action'] == "admin register"){
        header('Location: ./admin_register_page.php?result=empty');
      }
      // when any value is not empty
    } else {
      $id = $_POST['id'];
      $password = $_POST['password'];
      $confirm = $_POST['password_confirm'];
      $name = $_POST['name'];
      $phone_number = $_POST['phone_number'];
      $email = $_POST['email'];
      $student_number = $_POST['student_number'];

      // User Register Page
      if($_POST['action'] == "user register"){
        $sql = "SELECT * FROM user where id = '$id'";
        $id_result = $mysqli->query($sql);    // 일치하는 id 검색

        $sql2 = "SELECT * FROM user where student_number = '$student_number'";
        $num_result = $mysqli->query($sql2);  // 일치하는 학번 검색

        // Check whether ID, Student Number Alreay Exist
        if($password != $confirm){
          header('Location: ./login_page.php?result=diff');
          // 일치하는 ID or 학번 검색
        } else if(isset($id_result) && isset($num_result)){
          $sql = "INSERT INTO user (id, password, name, phone_number, email, student_number)";
          $sql = $sql."VALUES('$id','$password','$name','$phone_number', '$email', '$student_number')";
          $result = $mysqli->query($sql);
          header('Location: ./login_page.php?result=success');
        } else {
          header('Location: ./user_register_page.php?result=exist');
        }


      // Admin Register Page
      } else if($_POST['action'] == "admin register"){
        $sql = "SELECT * FROM admin where id='$id'";
        $id_result = $mysqli->query($sql);    // 일치하는 id 검색

        $sql2 = "SELECT * FROM admin where student_number='$student_number'";
        $num_result = $mysqli->query($sql2);  // 일치하는 학번 검색

        // Check whether ID, Student Number Alreay Exist
        if($password != $confirm){
          header('Location: ./login_page.php?result=diff');
          // 일치하는 ID or 학번 검색
        } else if(isset($id_result) && isset($num_result)){
          $account = $_POST['account'];
          $sql = "INSERT INTO admin (id, password, name, phone_number, email, student_number, account)";
          $sql = $sql."VALUES('$id','$password','$name','$phone_number', '$email', '$student_number', '$account')";
          $result = $mysqli->query($sql);
          header('Location: ./login_page.php?result=success');
        } else {
          header('Location: ./admin_register_page.php?result=wrong');
        }
      }
    }
  }
?>
