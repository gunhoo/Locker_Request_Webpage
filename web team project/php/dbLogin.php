<?php
	// MySQL Login
	$host = 'localhost';
	$user = 'root';
	$pw = 'cau1010';
	$dbName = 'mylocker';
	// MySQL & DB 접속
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	/*
		// MySQL 접속
		$mysqli = mysql_connect($host, $user, $pw);
		// DB 생성
		$sql = "CREATE DATABASE IF NOT EXISTS '$dbName'";
		$result = $mysqli->query($sql);
		
		// 검색: mysql_connect 에러 Call to undefined function mysql_connect()
		// 참고: https://www.phpschool.com/gnuboard4/bbs/board.php?bo_table=qna_install&wr_id=43642
	*/

	// Access to User Table
	$sql = "SELECT * FROM user";
	$user = $mysqli->query($sql);
	// Create User Table
	if($user === FALSE) {
		$sql = "CREATE TABLE user (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			PRIMARY KEY (id)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $user = $mysqli->query($sql);
	}

// Access to Admin Table
	$sql2 = "SELECT * FROM admin";
	$admin = $mysqli->query($sql2);
	// Create Admin Table
	if($admin === FALSE) {
		$sql2 = "CREATE TABLE admin (
			id VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			name VARCHAR(15) NOT NULL,
			phone_number VARCHAR(15) NOT NULL,
			email VARCHAR(30) NOT NULL,
			student_number VARCHAR(12) NOT NULL,
			account VARCHAR(30),
			PRIMARY KEY (id)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
		$admin = $mysqli->query($sql2);
	}

// Access to Locker Table
	$sql3 = "SELECT * FROM locker";
	$locker = $mysqli->query($sql3);
	// Create Locker Table
	if($locker === FALSE) {
		$sql3 = "CREATE TABLE locker (
			locker_id INT AUTO_INCREMENT NOT NULL,
			locker_number INT NOT NULL,
			building VARCHAR(30) NOT NULL,
			location VARCHAR(30) NOT NULL,
			expiry_date DateTime,
			rental_fee VARCHAR(12) NOT NULL,
			remittance_account VARCHAR(20) NOT NULL,
			user_id VARCHAR(30),
			status VARCHAR(15) NOT NULL,
			PRIMARY KEY (locker_id)
		) ENGINE = InnoDB DEFAULT CHARSET=utf8";
    $locker = $mysqli->query($sql3);
	}
?>
