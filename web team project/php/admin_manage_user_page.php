<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];
	if(isset($_POST['search'])){
		$search = $_POST['search'];
		$sql = "SELECT * FROM user WHERE ".$_POST['searchby']."= '$search'";
		$user = $mysqli->query($sql);
	} else {
		$user = null;
	}
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="..\css\style_admin_manage_user.css">
  </head>

  <body>
    <header>
      <nav class="menu">
        <ul>
					<li><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">Homepage</a></li>
					<li ><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage Lockers</a></li>
					<li id="clicked_menu"><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage User</a></li>
					<li ><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">Administrator Page</a></li>
        </ul>
      </nav>
    </header>
    <nav class="sub_menu">
      <ul>
        <li id="clicked_sub_menu">View User Info</li>
      </ul>
    </nav>
    <article>
      <h1>Find User</h1>
      <div id= "find">
        <form  method="POST">
          <ul id="info_list">
						<select name="searchby">
							<option>name</option>
							<option>student_number</option>
							<option>id</option>
						</select>
            <li> <input type="text" name="search" placeholder="Search"></li>
						<button action=".\admin_view_user_info_page.php" id="search" type="submit">Search</button>
          </ul>
        </form>
      </div>
			<?php
				if($user != null){
					$result = mysqli_fetch_assoc($user);
		      echo ' <h1>Result</h1>
		     	<div id="find2">
		        <form>
		          <ul id="info_list2">
		            <li>Name</li>
								<li>Student Number</li>
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
								echo '<li><input class="info_list" type="text" name="student_number" value="'.$result['student_number'].'"></li>'."\n";
		            echo '<li><input class="info_list" type="text" name="id"  value="'.$result['id'].'"></li>'."\n";
		            echo '<li><input class="info_list" type="tel" name="phoneNumber" value="'.$result['phone_number'].'"></li>'."\n";
		            echo '<li><input class="info_list" type="email" name="email"  value="'.$result['email'].'"></li>'."\n";
		          echo '</ul>
		        </form>
		      </div>';
			}else{
				echo '<p>No results</p>'."\n";
			}
			?>
    </article>
  </body>
</html>
