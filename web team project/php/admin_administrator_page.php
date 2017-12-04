<?php
    include "dbLogin.php";
    $myAdmin_id = $_GET['myAdmin_id'];
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
        <li><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Homepage</a></li>
        <li ><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Manage Lockers</a></li>
        <li><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Manage User</a></li>
        <li id="clicked_menu"><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Administrator Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li id="clicked_sub_menu">Administrator Info</li>
    </ul>
  </nav>
  <article>
    <h1>Admin Info</h1>
    <form action=".\admin_homepage.php" method="post">
      <ul class="admin_info">
          <li> <input class = "admin" id ="admin_password" type="password"
             name="admin_password" placeholder="Password"></li>
          <li> <input class = "admin" id ="admin_password_confirm" type="password"
             name="admin_password_confirm" placeholder="Password Confirm"></li>
          <li> <input class = "admin" id ="admin_name" type="text"
             name="admin_name" placeholder="Name"></li>
          <li> <input class = "admin" id ="admin_phnum" type="text"
             name="admin_phnum" placeholder="Phone Number"></li>
          <li> <input class = "admin" id ="admin_email" type="text"
             name="admin_email" placeholder="E-mail"></li>
      </ul>
      <input id="reqBtn" type="button" value="Confirm">

      <h1>Withdrawal</h1>
      <form action="index.html" method="post">
        <input class = "admin" id ="admin_password" type="password"
          name="admin_password" placeholder="Password">
         <input id="reqBtn" type="button" value="Modify">
      </form>
  </article>
</body>

</html>
