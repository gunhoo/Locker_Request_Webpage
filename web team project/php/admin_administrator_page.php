<?php
    include "adminDBLogin.php";
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
        <li><a href=".\admin_homepage.php">
          Homepage</a></li>
        <li ><a href=".\admin_manage_lockers.php">
          Manage Lockers</a></li>
        <li><a href=".\admin_view_user_info_page.php">
          Manage User</a></li>
        <li id="clicked_menu"><a href=".\admin_administrator_page.php">
          Administrator Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li>Administrator Locker Info</li>
    </ul>
  </nav>
  <article>
    <h1>Admin Info</h1>
    <form action=".\admin_homepage.php" method="post">
      <ul id="admin_info">
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
          <li> <input class = "admin" id ="admin_school" type="text"
             name="admin_school" placeholder="School"></li>
          <li> <input class = "admin" id ="admin_department" type="text"
             name="admin_department" placeholder="Department"></li>
          <li> <input class = "admin" id ="admin_major" type="text"
            name="admin_major" placeholder="Major"></li>
      </ul>
      <input id="reqBtn" type="button" value="Confirm">

      <h1>withdrawal</h1>
      <form action="index.html" method="post">
      <input class = "admin" id ="admin_password" type="password"
         name="admin_password" placeholder="Password">
      <input id="reqBtn" type="button" value="Confirm">
    </form>
  </article>
</body>

</html>
