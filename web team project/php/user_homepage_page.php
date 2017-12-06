<?php
  $myUser_id = $_GET['myUser_id'];
  if($myUser_id ==""){
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
    <header id="user_header">
      <nav class="menu">
        <ul>
          <li id="user_clicked_menu"><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
  	        Homepage</a></li>
  	      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
  	        Locker Request</a></li>
  	      <li ><a href=".\user_manage_my_locker_page.php?myUser_id=<?=$myUser_id?>">
  	        Manage My Locker</a></li>
  	      <li><a href=".\user_user_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
          <li><a href=".\admin_homepage_page.php?myUser_id=">Logout</a></li>
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
      <h2>How to use Manager?</h2>

      <h3>First, You can request Lockers.</h3>
       This Site is made for your Locker.</br>
       So, You can borrow the Lockers Very Cheap & Easy</br>

       <h3>Second, You can manage your Locker </h3>
       This System can edit your Lockers</br>
       So, you can know your Locker's expiry date and rental_fee etc.. </br>

       <h3>Third, You can view your infos.</h3>
       Your Info is stored In our DB Very Safely</br>
       So, you can edit your info Very Safe & Easy</br>
       </article>

       <article>
       <h2>Made By</h2>
      <h5> Kim Chan-il : yh0438 </h5>
      <h5> Park Gun-hoo : gunhoo</h5>
      <h5> Choi Jun-young : cupjoo</h5>
    </article>
  </body>
</html>
