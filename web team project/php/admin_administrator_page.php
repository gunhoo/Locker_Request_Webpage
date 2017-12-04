<?php
    include "dbLogin.php";
    $myAdmin_id = $_GET['myAdmin_id'];

    $sql = "SELECT* FROM admin WHERE id Like '$myAdmin_id'";
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
  <link rel="stylesheet" type="text/css" href="..\css\style_admin_info.css">
</head>
<body>
  <header>
    <nav class="menu">
      <ul>
        <li><a href=".\admin_homepage_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Homepage</a></li>
        <li ><a href=".\admin_manage_lockers_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Manage Lockers</a></li>
        <li><a href=".\admin_manage_user_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Manage User</a></li>
        <li id="clicked_menu"><a href=".\admin_administrator_page.php?myAdmin_id=<?=$myAdmin_id?>">
          Administrator Page</a></li>
      </ul>
    </nav>
  </header>
  <nav class="sub_menu">
    <ul>
      <li id="clicked_sub_menu">Administrator Info</li>
    </ul>
  </nav>
  <article>
    <h1>Admin Info</h1>
    <form action=".\modify.php?myAdmin_id=<?=$myAdmin_id?>" method="post">
      <ul class="admin_info">
          <li> <input class = "admin" id ="admin_password" type="password"
             name="admin_password" placeholder="Password"></li>
          <li> <input class = "admin" id ="admin_password_confirm" type="password"
             name="admin_password_confirm" placeholder="Password Confirm"></li>
          <li> <input class = "admin" id ="admin_name" type="text"
             name="admin_name" placeholder="Name" value="<?php echo $row['name'];?>"></li>
          <li> <input class = "admin" id ="admin_phnum" type="text"
            name="admin_phnum" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>"></li>
         <li> <input class = "admin" id ="admin_email" type="text"
            name="admin_email" placeholder="E-mail" value="<?php echo $row['email']; ?>"></li>
     </ul>
     <input id="reqBtn" type="submit" name="action" value="Admin Modify">

     <h1>Withdrawal</h1>
     <form action=".\delete.php?myAdmin_id=<?=$myAdmin_id?>" method="post">
       <input class = "admin" id ="admin_password2" type="password"
         name="admin_password" placeholder="Password">
        <input id="withBtn" type="submit" name="action" value="Admin Withdraw">
     </form>
 </article>

</body>

</html>
