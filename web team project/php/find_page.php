<?php
include "dbLogin.php";

if(isset($_GET['result'])){
  if($_GET['result'] == 'id_find'){
    //$_GET['id']
    /*<?=$myAdmin_id?>*/
    echo '<script>alert("ID: '.$_GET['id'].'")</script>';
  } else if ($_GET['result'] == 'pw_find'){
    echo '<script>alert("Password: '.$_GET['password'].'")</script>';
  } else if ($_GET['result'] == 'incorrect'){
    echo '<script>alert("사용자 정보를 찾을 수 없습니다.")</script>';
  } else if ($_GET['result'] == 'empty'){
    echo '<script>alert("사용자 정보를 입력해주세요.")</script>';
  }
}
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_find.css">
</head>

<body>
  <header>

  </header>
  <article>
    <div class="title">Find ID</div>
    <form action=".\find.php" method="post">
      <div class="info">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="email" placeholder="E-mail">
      </div>
      <button class="btn" type="submit" name="action" value="ID Find">Find</button>
      <Button class="btn" type="button" onClick="location.href='login_page.php'"
       value="Cancel">Cancel</Button>
    </form>

    <div class="title">Find PW</div>
    <form action=".\find.php" method="post">
      <div class="info">
        <input type="text" name="id" placeholder="ID">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="email" placeholder="E-mail">
      </div>
      <button class="btn" type="submit" name="action" value="PW Find">Find</button>
      <Button class="btn" type="button" onClick="location.href='login_page.php'"
       value="Cancel">Cancel</Button>
    </form>
  </article>
</body>

</html>
