<?php
  include "dbLogin.php";

  if(isset($_GET['result'])){
    if($_GET['result'] == 'wrong'){
      echo '<script>alert("잘못된 정보를 입력했습니다.")</script>';
    } else if ($_GET['result'] == 'success'){
      echo '<script>alert("회원가입이 완료되었습다.")</script>';
    }
  }
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/style_login.css">
</head>

<body>
  <header>

  </header>
  <article>
    <div class="title">Login</div>
    <form action="./login_check.php" method="post">
      <div id="loginDiv">
        <div id="info">
          <input type="text" name="id" placeholder="ID">
          <input type="password" name="password" placeholder="Password">
        </div>
        <div>
          <input id="findBtn" type="submit" name="action" value="Find ID/PW">
          <input id="loginBtn" type="submit" name="action" value="User Login">
          <input id="adminLoginBtn" type="submit" name="action" value="Admin Login">
        </div>
      </div>
    </form>
    <div id="register">
      <form action="./user_register_page.php" method="post">
        <input class="registerBtn" type="submit" value="User Register">
      </form>
      <form action="./admin_register_page.php" method="post">
        <input class="registerBtn" type="submit" value="Admin Register">
      </form>
    </div>
  </article>
</body>

</html>
