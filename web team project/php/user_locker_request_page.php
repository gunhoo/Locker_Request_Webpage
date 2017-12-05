<?php
  $myUser_id = $_GET['myUser_id'];
  if($myUser_id ==""){
    header('Location: ./login_page.php?result=no_id');
  }
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$sql = "SELECT building FROM locker GROUP BY building";
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
    <form action="index.html" method="post" name="myForm">
      <select class="selector" name="building" onChange="javascript:callLocation(this)">
        <option value="" disabled selected>Building</option>
        <?php
  				while($building = mysqli_fetch_assoc($user)){
            echo '<option value="'.$building['building'].'">'.$building['building'].'</option>';
          }
        ?>
      </select>
      <select class="selector" name="location" onChange="javascript:callLockerNumer(this)">
        <option value="" disabled selected>Location</option>
      </select>
      <select class="selector" name="locker_number">
        <option value="" disabled selected>Locker Number</option>
      </select>
      <ul id="info_list">
        <li>Expiry Date</li>
        <li>Rental Fee</li>
        <li>Remittance Account</li>
        <li class="info">2018-01-01</li>
        <li class="info">5000 (원)</li>
        <li class="info">우리 1002-443-492296</li>
      </ul>
      <input id="reqBtn" type="button" value="Request">
    </form>

  </article>
  <script type="text/javascript">
    function callLocation(selectObj) {
      var myform = document.myForm;
      // 초기화
      var objSel = myform.location;
      for(i=objSel.length; i>=0; i--){
        objSel.options[i]=null;
      }
      // 추가
      <?$building=?> = selectObj.value; // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2
      <?php
        $sql2 = "SELECT location FROM locker WHERE building='$building' GROUP BY location";
        $loc = $mysqli->query($sql);
      ?>
      var op = new Option();
      while(<?=$location = mysqli_fetch_assoc($loc)?>){
        op.value = <?=$location['location']?>; // 값 설정
        op.text = <?=$location['location']?>; // 텍스트 설정
      }
      op.selected = false;
      myform.location.options.add(op); // 옵션 추가
    }
    function callLockerNumer(selectObj) {
      var myform = document.myForm;
      // 초기화
      var objSel = myform.locker_number;
      for(i=objSel.length; i>=0; i--){
        objSel.options[i]=null;
      }
      // 추가
      <?$location=?> = selectObj.value; // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2
      <?php
        $sql2 = "SELECT locker_number FROM locker WHERE location='$location' GROUP BY locker_number";
        $locnum = $mysqli->query($sql);
      ?>
      var op = new Option();
      while(<?=$locker_number = mysqli_fetch_assoc($locnum)?>){
        op.value = <?=$locker_number['locker_number']?>; // 값 설정
        op.text = <?=$locker_number['locker_number']?>; // 텍스트 설정
      }
      op.selected = false;
      myform.locker_number.options.add(op); // 옵션 추가
    }
  </script>
</body>

</html>
