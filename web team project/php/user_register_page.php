<?php
  if(isset($_GET['result'])){
    if($_GET['result'] == 'wrong'){
      echo '<script>alert("잘못된 정보를 입력했습니다.")</script>';
    } else if ($_GET['result'] == 'exist'){
      echo '<script>alert("이미 회원가입된 사용자입니다.")</script>';
    } else if ($_GET['result'] == 'empty'){
      echo '<script>alert("모든 정보를 입력해주세요.")</script>';
    } else if ($_GET['result'] == 'diff'){
      echo '<script>alert("비밀번호가 일치하지 않습니다.")</script>';
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" type="text/css" href="..\css\style_register.css">
    </head>
  </head>
  <body>
    <header id="userHeader"></header>
    <article id="register_background">
      <div class="userTitle">Register</div>
      <form action=".\register_check.php" method="post">
        <div id="registerDiv">
          <div id="info">
            <input type="text" name="id" placeholder="ID">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirm" placeholder="Password Confirm">
            <input type="text" name="name" placeholder="Name">
            <input type="tel" name="phone_number" placeholder="Phone Number">
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="student_number" placeholder="Student Number">
          </div>
        </div>
        <div>
          <button type="submit" id="registerBtn" name="action" value="user register"> Register </button>
          <button type="button" id="cancelBtn" name="cancelBtn" onClick="location.href='login_page.php'">Cancel</button>
        </div>
      </form>
    </article>
  </body>
</html>
