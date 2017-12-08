<?php
  $myUser_id = $_POST['myUser_id'];
  if($myUser_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
	include "dbLogin.php";
  $building = $_POST['building'];
  $location = $_POST['location'];
	$sql = "SELECT locker_number FROM locker WHERE building='$building' AND location='$location' AND status = 'empty' GROUP BY locker_number";
	$user = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_user_request.css">
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
				<li><a href=".\user_homepage_page.php?myUser_id=<?=$myUser_id?>">
	        Homepage</a></li>
	      <li id="clicked_menu"><a href=".\user_locker_request_page.php?myUser_id=<?=$myUser_id?>">
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
      <li id="clicked_sub_menu">Locker Request</li>
    </ul>
  </nav>
  <article>
    <h1>Locker Information</h1>
    <form action=".\user_locker_request_page.php" method="get" name="myForm">
      <input type="hidden" name="building" value="<?=$building?>">
      <input type="hidden" name="location" value="<?=$location?>">
      <input type="hidden" name="myUser_id" value="<?=$myUser_id?>">
      <select class="selector" name="locker_number">
        <option value="" disabled selected>Locker Number</option>
        <?php
  				while($locker_number = mysqli_fetch_assoc($user)){
              echo '<option value="'.$locker_number['locker_number'].'">'.$locker_number['locker_number'].'</option>';
          }
        ?>
      </select>
      <input id="reqBtn2" type="submit" value="Request">
    </form>

  </article>
</body>

</html>
