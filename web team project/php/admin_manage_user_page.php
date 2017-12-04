<?php
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$sql = "SELECT * FROM user WHERE student_number LIKE ".$_GET['studentNumber'];
	$user = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="..\css\style_admin_view_user_info.css">
  </head>

  <body>
    <header>
      <nav class="menu">
        <ul>
					<li><a href=".\admin_home_page.php">Homepage</a></li>
					<li ><a href=".\admin_manage_lockers_page.php">Manage Lockers</a></li>
					<li id="clicked_menu"><a href=".\admin_manage_user_page.php">Manage User</a></li>
					<li ><a href=".\admin_administrator_page.php">Administrator Page</a></li>
        </ul>
      </nav>
    </header>
    <nav class="sub_menu">
      <ul>
        <li>View User Info</li>
      </ul>
    </nav>
    <article>
      <h1>Find User by Student Number</h1>
      <div id= "find">
        <form  method="GET">
          <ul id="info_list">
            <li> <input type="text" name="studentNumber" placeholder="Student Number"></li>
          </ul>
          <button action=".\admin_view_user_info_page.php" id="search" type="submit">Search</button>
        </form>
      </div>
	      <h1>Result</h1>
				<?php
					if($result = mysqli_fetch_assoc($user)){
	     		echo ' <div id="find">
	        <form>
	          <ul id="info_list">
	            <li>Name</li>
	            <li>ID</li>
	            <li>Phone Number</li>
	            <li>E-mail</li>
	          </ul>
	        </form>
	      </div>
	      <div id="result">
	        <form>
	          <ul id="reult">';
	            echo '<li><input class="info_list" type="text" name="name" value="'.$result['name'].'"></li>'."\n";
	            echo '<li><input class="info_list" type="text" name="id"  value="'.$result['id'].'"></li>'."\n";
	            echo '<li><input class="info_list" type="tel" name="phoneNumber" value="'.$result['phone_number'].'"></li>'."\n";
	            echo '<li><input class="info_list" type="email" name="email"  value="'.$result['email'].'"></li>'."\n";
	          echo '</ul>
	        </form>
	      </div>';
			}
			?>
    </article>
  </body>
</html>
