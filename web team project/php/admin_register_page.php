
<?php
  if(isset($_GET['result'])){
    if($_GET['result'] == 'wrong'){
      echo '<script>alert("잘못된 정보를 입력했습니다.")</script>';
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
    <header id="adminHeader">    </header>
    <article id="register_background">
      <div class="adminTitle">Register</div>
      <form action=".\register_check.php" method="post">
        <div id="registerDiv">
          <div id="info">
            <input type="text" name="id" placeholder="ID">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirm" placeholder="Password Confirm">
            <input type="text" name="name" placeholder="Name">
            <input type="tel" name="phone_number" placeholder="Phone Number">
            <input type="email" name="email" placeholder="E-mail">
            </select>
            <input type="text" name="student_number" placeholder="Student Number">
            <div id="account">
              <input type="text" name="account_number" placeholder="Acoount Number">
            </div>
          </div>
        </div>
        <div>
          <button type="submit" id="registerBtn" name="action" value="admin register"> Register </button>
        </div>
      </form>
    </article>
  </body>
</html>
