<?php
  $myUser_id = $_POST['myUser_id'];
  if($myUser_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
	include "dbLogin.php";
  $building = $_POST['building'];
	$sql = "SELECT location FROM locker WHERE building='$building' GROUP BY location";
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
    <form action=".\locker_number.php" method="post" name="myForm">
      <input type="hidden" name="building" value="<?=$building?>">
      <input type="hidden" name="myUser_id" value="<?=$myUser_id?>">
      <select class="selector" name="location">
        <option value="" disabled selected>Location</option>
        <?php
  				while($location = mysqli_fetch_assoc($user)){
            echo '<option value="'.$location['location'].'">'.$location['location'].'</option>';
          }
        ?>
      </select>
      <input id="reqBtn2" type="submit" value="Check">
    </form>

  </article>
</body>

</html>
