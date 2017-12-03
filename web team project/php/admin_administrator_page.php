<?php
    include "dbLogin.php";

    $myAdmin_id = $_POST['myAdmin_id'];
    $sql2 = "SELECT * FROM admin WHERE id=$myAdmin_id";
  	$admin = $mysqli->query($sql2);

    if(isset($_POST['action']) && ($_POST['action'] == "Confirm")) {
      $password = $_POST['admin_password'];
      $name = $_POST['name'];
      $phone_number = $_POST['admin_phnum'];
      $email = $_POST['admin_email'];

      $sql = "UPDATE admin
      SET name='$name', phone_number='$phone_number', email='$email', password='$password'
      where id='$myAdmin_id';";
      $modifyResult = $mysqli->query($sql);
      echo '<script>alert("정보가 수정되었습니다.")</script>';
    }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_admin_info.css">
</head>
<body>
  <header>
    <nav class="menu">
      <ul>
        <li><a href=".\admin_home_page.php">Homepage</a></li>
        <li ><a href=".\admin_manage_lockers_page.php">Manage Lockers</a></li>
        <li ><a href=".\admin_manage_user_page.php">Manage User</a></li>
        <li id="clicked_menu"><a href=".\admin_administrator_page.php">Administrator Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li>Administrator Info</li>
    </ul>
  </nav>
  <article>
    <h1>Administrator Info</h1>
    <form action=".\admin_administrator_page.php" method="post">
      <ul id="admin_info">
          <li><input class = "admin" type="password" name="admin_password" placeholder="Password"></li>
          <?php
            if($result = mysqli_fetch_assoc($admin)){
              echo '<li><input class = "admin" type="text" name="admin_name" placeholder="Name" value="'.$result['name'].'"></li>'.'\n';
              echo '<li><input class = "admin" type="text" name="admin_phnum" placeholder="Phone Number" value="'.$result['phone_number'].'"></li>'.'\n';
              echo '<li><input class = "admin" type="text" name="admin_email" placeholder="E-mail" value="'.$result['email'].'"></li>'.'\n';
            }
           ?>
      </ul>
      <input id="reqBtn" type="button" name="action" value="Confirm">
    </form>
  </article>
</body>

</html>
