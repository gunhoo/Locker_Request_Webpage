<?php
  include "dbLogin.php";
  $myUser_id = $_GET['myUser_id'];
  $sql = "SELECT* FROM user WHERE id Like '$myUser_id'";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);

  if(isset($_GET['result'])){
    if($_GET['result'] == 'modified'){
      echo '<script>alert("수정이 완료되었습니다.")</script>';
    } else if($_GET['result'] == 'diff'){
      echo '<script>alert("비밀번호가 일치하지 않습니다.")</script>';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="..\css\style_user_info.css">
  </head>
  <body>
    <header>
      <nav class="menu">
        <ul>
          <li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
  	        Homepage</a></li>
  	      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
  	        Locker Request</a></li>
  	      <li ><a href=".\user_manage_my_locker_page.php?myUser_id=<?=$myUser_id?>">
  	        Manage My Locker</a></li>
  	      <li id="clicked_menu"><a href=".\user_user_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
        </ul>
      </nav>
    </header>
    <nav class="sub_menu">
      <ul>
        <li>Manage Info</li>
      </ul>
    </nav>
    <article>
      <h1>My Locker Info</h1>
      <form action=".\modify.php?myUser_id=<?=$myUser_id?>" method="post">
        <ul id="info_list">
          <li><input class="info_list" type="password" name="password"  placeholder="Password"></li>
          <li><input class="info_list" type="password" name="password_confirm"  placeholder="Password Confirm"></li>
          <li><input class="info_list" type="text" name="name" placeholder="Name" value="<?php echo $row['name'];?>"></li>
          <li><input class="info_list" type="text" name="phone_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>"></li>
          <li><input class="info_list" type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>"></li>
        </ul>
        <input id="reqBtn" type="submit" name="action" value="User Modify">
      </form>
      <h1>Withdrawal</h1>
      <form action=".\delete.php?myUser_id=<?=$myUser_id?>" method="post">
        <input id="pwText" type="password" name="password" placeholder="Password">
        <input id="withBtn" type="submit" name="action" value="User Withdraw">
      </form>
    </article>
  </body>
</html>
