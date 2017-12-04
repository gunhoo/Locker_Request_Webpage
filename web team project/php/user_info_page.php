<?php
  $myUser_id = $_GET['myUser_id'];
 ?>

<?php
  include "dbLogin.php";

  function userInfo(){
    $sql1 = "UPDATE user SET password = ".$_GET['password']." WHERE id Like '$myUser_id'  ";
    $sql2 = "UPDATE user SET name = ".$_GET['name']." WHERE id Like '$myUser_id'";
    $sql3 = "UPDATE user SET phone_number = ".$_GET['ph_number']." WHERE id LIKE '$myUser_id'";
    $sql4 = "UPDATE user SET email = ".$_GET['email']." WHERE id Like '$myUser_id'";

    mysqli_query($mysqli, $sql1);
    mysqli_query($mysqli, $sql2);
    mysqli_query($mysqli, $sql3);
    mysqli_query($mysqli, $sql4);

  }

  $sql = "SELECT* FROM user WHERE id Like '$myUser_id'";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);
?>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_user_info.css">

<script>
  function userInfojava(){
  alert("<?php echo userInfo() ?>");
  }
  </script>
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
        <li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
	        Homepage</a></li>
	      <li ><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
	        Locker Request</a></li>
	      <li ><a href=".\user_locker_info_page.php?myUser_id=<?=$myUser_id?>">
	        Manage My Locker</a></li>
	      <li id="clicked_menu"><a href=".\user_info_page.php?myUser_id=<?=$myUser_id?>">User Page</a></li>
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
    <form>
      <ul id="info_list">
        <li><input class="info_list" type="password" name="password"  placeholder="Password" value="<?php echo $row['password'];?>"></li>
        <li><input class="info_list" type="password" name="password_confirm"  placeholder="Password Confirm" value="<?php echo $row['password'];?>"></li>
        <li><input class="info_list" type="text" name="name" placeholder="Name" value="<?php echo $row['name'];?>"></li>
        <li><input class="info_list" type="text" name="ph_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>"></li>
        <li><input class="info_list" type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>"></li>
      </ul>
      <input id="reqBtn" type="button" onclick="userInfojava()" value="Modify">
    </form>
  </article>
</body>

</html>
