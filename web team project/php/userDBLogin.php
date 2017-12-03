<?php
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$myAdmin_id = $_POST['myAdmin_id'];

	$sql = "SELECT * FROM user";
	$user = $mysqli->query($sql);

	if($user === FALSE) {
		$sql = "CREATE TABLE user (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			school VARCHAR(30) NOT NULL,
			department VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			bank VARCHAR(12),
			account VARCHAR(20),
			PRIMARY KEY (student_number)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $user = $mysqli->query($sql);
	}
	$sql2 = "SELECT * FROM admin where id='$myAdmin_id'";
	$admin = $mysqli->query($sql2);

	if($admin === FALSE) {
		$sql2 = "CREATE TABLE mylocker.user (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			school VARCHAR(30) NOT NULL,
			department VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			bank VARCHAR(12),
			account VARCHAR(20),
			PRIMARY KEY (student_number)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
		$admin = $mysqli->query($sql2);
	}

	$sql3 = "SELECT * FROM locker";
	$locker = $mysqli->query($sql3);

	if($locker === FALSE) {
		$sql3 = "CREATE TABLE mylocker.locker (
			locker_id VARCHAR(30) NOT NULL,
			locker_number INT NOT NULL,
			school VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			building VARCHAR(30) NOT NULL,
			location VARCHAR(30) NOT NULL,
			expiry_date DateTime,
			rental_fee VARCHAR(12) NOT NULL,
			remittance_bank VARCHAR(12) NOT NULL,
			remittance_accout VARCHAR(20) NOT NULL,
			user_id VARCHAR(30) NOT NULL,
			status VARCHAR(15) NOT NULL,
			PRIMARY KEY (locker_id)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $locker = $mysqli->query($sql3);
	}
?>

<?php
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$myAdmin_id = $_POST['myAdmin_id'];

	$sql = "SELECT * FROM user";
	$user = $mysqli->query($sql);

	if($user === FALSE) {
		$sql = "CREATE TABLE user (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			school VARCHAR(30) NOT NULL,
			department VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			bank VARCHAR(12),
			account VARCHAR(20),
			PRIMARY KEY (student_number)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $user = $mysqli->query($sql);
	}
	$sql2 = "SELECT * FROM admin where id='$myAdmin_id'";
	$admin = $mysqli->query($sql2);

	if($admin === FALSE) {
		$sql2 = "CREATE TABLE mylocker.user (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			school VARCHAR(30) NOT NULL,
			department VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			bank VARCHAR(12),
			account VARCHAR(20),
			PRIMARY KEY (student_number)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
		$admin = $mysqli->query($sql2);
	}

	$sql3 = "SELECT * FROM locker";
	$locker = $mysqli->query($sql3);

	if($locker === FALSE) {
		$sql3 = "CREATE TABLE mylocker.locker (
			locker_id VARCHAR(30) NOT NULL,
			locker_number INT NOT NULL,
			school VARCHAR(30) NOT NULL,
			major VARCHAR(30) NOT NULL,
			building VARCHAR(30) NOT NULL,
			location VARCHAR(30) NOT NULL,
			expiry_date DateTime,
			rental_fee VARCHAR(12) NOT NULL,
			remittance_bank VARCHAR(12) NOT NULL,
			remittance_accout VARCHAR(20) NOT NULL,
			user_id VARCHAR(30) NOT NULL,
			status VARCHAR(15) NOT NULL,
			PRIMARY KEY (locker_number)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $locker = $mysqli->query($sql3);
	}
?>
