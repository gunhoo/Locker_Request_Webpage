<?php
  $myUser_id = $_GET['myUser_id'];
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="..\css\style_main.css">
  </head>
  <body>
    <header id="user_header">
      <nav class="menu">
        <ul>
          <li id="user_clicked_menu"><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
  	        Homepage</a></li>
  	      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
  	        Locker Request</a></li>
  	      <li ><a href=".\user_locker_info_page.php?myUser_id=<?=$myUser_id?>">
  	        Manage My Locker</a></li>
  	      <li><a href=".\user_info_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
        </ul>
      </nav>
    </header>
    <nav class="sub_menu">
      <ul>
        <li id="user_clicked_sub_menu">Summary</li>
      </ul>
    </nav>
    <article>
      <h1>About Locker Manager</h1>
      How to use?
    </article>
  </body>
</html>
