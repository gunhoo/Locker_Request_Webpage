<?php
	include "dbLogin.php";
	$myAdmin_id = $_GET['myAdmin_id'];

  function addLockerphp(){
  $sqladd = "INSERT INTO Locker (location, expiry_date, rental_fee, remittance_bank, remittance_account, user_id, status) VALUES( '".$_GET['location']."', '".$_GET['expiry_date']."', '".$_GET['rental_fee']."', '".$_GET['bank_field']."', '".$_GET['add_account_field']."', myAdmin_id,1)";
	$result =  mysqli_query($conn, $sqladd);
	}

?>

<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="..\css\style_admin_check_locker_info.css">

  <script language="javascript">
	function addLockerjava(){
		alert("<?php echo addLockerphp() ?>");
	}
	</script>
</head>

<body>
  <header>
    <nav class="menu">
      <ul>
				<li><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">Homepage</a></li>
				<li id="clicked_menu"><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage Lockers</a></li>
				<li ><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">Manage User</a></li>
				<li ><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">Administrator Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
			<li id="clicked_sub_menu"><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">Add New Locker</a></li>
      <li><a href=".\admin_request_list_page.php?myAdmin_id=<?=$myAdmin_id?>">Request List</a></li>
      <li><a href=".\admin_check_locker_info_page.php?myAdmin_id=<?=$myAdmin_id?>">Check Locker Info</a></li>
    </ul>
  </nav>
  <article>
    <h1>Add New Lockers</h1>
    <form action="index.html" method="post">
      <ul id="info_list">
        <li>Building</li>
        <li>Location</li>
        <li>Number of Locker</li>
        <li>Expiry Date</li>
        <li>Rental Fee</li>
        <li>Remittance Account</li>
        <li> <input class = "addInfo" type="text" name="building" placeholder="Building"></li>
        <li> <input class = "addInfo" type="text" name="location" placeholder="Location"></li>
        <li class="addInfo">
          <select name="row">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4" selected>4</option>
          </select> x
          <select name="col">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="4">4</option>
          </select>
        </li>
        <li><input class="addInfo" type="text" name="expiry_date" value="2010-11-01" placeholder="(일)"></li>
        <li><input class="addInfo" type="text" name="rental_fee" value="5000원" placeholder="(원)"></li>
        <li><input class="addInfo" id="add_account_field" type="text" name="account" value="우리 1002-443-492296"></li>
      </ul>
      <input id="reqBtn" type="button" onclick = "addLockerjava()" value="Confirm">
    </form>
  </article>
</body>
