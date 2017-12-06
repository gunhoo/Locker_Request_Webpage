<?php
  $myAdmin_id = $_GET['myAdmin_id'];
  if($myAdmin_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="{% static 'css/blog.css' %}">
        <link href="//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="..\css\style_main.css">

  </head>
  <body>
    <header id="admin_header">
      <nav class="menu">
        <ul>
          <li id="admin_clicked_menu"><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">Homepage</a></li>
  				<li><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage Lockers</a></li>
  				<li><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage User</a></li>
  				<li><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">Administrator Page</a></li>
          <li><a href=".\admin_homepage_page.php?myAdmin_id=">Logout</a></li>
        </ul>
      </nav>
    </header>
    <nav class="sub_menu">
      <ul>
        <li id="admin_clicked_sub_menu">Summary</li>
      </ul>
    </nav>
    <article>
      <h1>About Locker Manager</h1>
    <h2>How to use Manager?</h2>

    <h3>First, You can manage Lockers.</h3>
    Administrator's main Mission is the managing Lockers.</br>
     For your First Mission, Click Manage Lockers tab.</br>

     <h3>Second, You can manage Users. </h3>
     This System can manage Users.</br>
     So, you can find Users Infos in this Manage Users tab. </br>

     <h3>Third, You can view your infos.</h3>
     You are not an Only administrator, So you have some Infos on DB.</br>
     So, you can view your infos on Administrator Infos Tab.</br>
     </article>
     <article>
     <h2>Made By</h2>
    <h5> Kim Chan-il : yh0438 </h5>
    <h5> Park Gun-hoo : gunhoo</h5>
    <h5> Choi Jun-young : cupjoo</h5>


    </article>
  </body>
</html>
