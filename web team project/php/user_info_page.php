<?php
$host = 'localhost';
$user = 'root';
$pw = 'cau1010';
$dbName = 'mylocker';
$mysqli = new mysqli($host, $user, $pw, $dbName);

  function userInfo(){
  $sql1 = "UPDATE user SET password = ".$_GET['password']." WHERE id Like 'gunhoo0216'  ";
  $sql2 = "UPDATE user SET name = ".$_GET['name']." WHERE id Like 'gunhoo0216'";
  $sql3 = "UPDATE user SET phone_number = ".$_GET['ph_number']." WHERE id LIKE 'gunhoo0216'";
  $sql4 = "UPDATE user SET email = ".$_GET['email']." WHERE id Like 'gunhoo0216'";

  mysqli_query($mysqli, $sql1);
  mysqli_query($mysqli, $sql2);
  mysqli_query($mysqli, $sql3);
  mysqli_query($mysqli, $sql4);

}

$sql = "SELECT* FROM user WHERE id Like 'gunhoo0216'";
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
        <li><a href=".\user_home_page.php">
	        Homepage</a></li>
	      <li ><a href=".\user_locker_request_page.php">
	        Locker Request</a></li>
	      <li ><a href=".\user_locker_info_page.php">
	        Manage My Locker</a></li>
	      <li id="clicked_menu"><a href=".\user_info_page.php">User Page</a></li>
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
        <li><input class="info_list" type="text" name="password"  placeholder="Password"></li>
        <li><input class="info_list" type="text" name="password_confirm"  placeholder="Password Confirm" value="<?php echo $row['password']; ?>"></li>
        <li><input class="info_list" type="text" name="name" value="<?php echo $row['name'];?>"></li>
        <li><input class="info_list" type="text" name="ph_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>"></li>
        <li><input class="info_list" type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>"></li>
      </ul>
      <input id="reqBtn" type="button" onclick="userInfojava()" value="Confirm">
    </form>
  </article>
</body>

</html>
