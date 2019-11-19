<?php
require("header.php");

$user = "senpai";
$pass = "noticeme";
$host = "localhost:3306";
$name = "senpai";

//CREATE DATABASE
try{
    $conn = new PDO("mysql:host=$host",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE `".$name."`";
	$conn->exec("DROP DATABASE IF EXISTS $name");
	$conn->exec($sql);
	echo "Senpai noticed me!\n";
}
catch(PDOException $e){
	echo "senpai didn't notice us ;(\n".$e->getMessage();
	die ();
}

///CREATE USER TABLE
try {
	$senpai = Call_onee_san();
	$sql = "CREATE TABLE `users` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`username` VARCHAR(50) NOT NULL,
		`email` VARCHAR(100) NOT NULL,
		`password` VARCHAR(255) NOT NULL,
		`display` longblob NOT NULL,
		`vkey` VARCHAR(50),
		`verified` tinyint(1) DEFAULT 0,
		`notify` tinyint(1) DEFAULT 1,
		`reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	$senpai->exec($sql);
	echo "Table users created\n";
}
catch (PDOException $e) {
	echo "Users table died miserbly: ".$e->getMessage()."\n";
}

////GALLERY TABLE 
try {
	$senpai = Call_onee_san();
	$sql = "CREATE TABLE `gallery` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`userid` INT(11) NOT NULL,
		`img` longblob,
		`up_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP/*,
		FOREIGN KEY (userid) REFERENCES users(id)*/
	  )";
	  $senpai->exec($sql);
	  echo "Gallery of onee-senpai exists!\n";
}
catch (PDOException $e) {
	echo "Never speak to me or my family again ~ Gallery table".$e->getMessage()."\n";
}

///CREATE LIKE TABLE
try {
    // hard connect cause dis shit aint workin
    $senpai = Call_onee_san();
    $sql = "CREATE TABLE `like` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `userid` INT(11) NOT NULL,
      `galleryid` INT(11) NOT NULL/*,
      FOREIGN KEY (userid) REFERENCES users(id),
      FOREIGN KEY (galleryid) REFERENCES gallery(id)*/
    )";
    $senpai->exec($sql);
    echo "Table like created successfully\n";
}
catch (PDOException $e) {
    echo "well shit bro! ~like table: ".$e->getMessage()."\n";
}

///CREATE COMMENT TABLE
try {
	// Connect to DATABASE previously created
	$senpai = Call_onee_san();
	$sql = "CREATE TABLE `comments` (
	  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `userid` INT(11) NOT NULL,
	  `galleryid` INT(11) NOT NULL,
	  `comment` TEXT/*,
	  FOREIGN KEY (userid) REFERENCES users(id),
	  FOREIGN KEY (galleryid) REFERENCES gallery(id)*/
	)";
	$senpai->exec($sql);
	echo "We can comment on how beautiful and amazing senpai is!\n";
} catch (PDOException $e) {
	echo "Senpai doesn't want us to comment ;( (comment table still broken)".$e->getMessage()."\n";
}
///SECURITY KEY TABLE
try {
	// Connect to DATABASE previously created
	$senpai = Call_onee_san();
	$sql = "CREATE TABLE `keys` (
	  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `userid` INT(11) NOT NULL,
	  `key` VARCHAR(255) NOT NULL
	)";
	$senpai->exec($sql);
	echo "Senpai has a key now!\n";
} catch (PDOException $e) {
	echo "Senpai doesn't want us to comment ;( (comment table still broken)".$e->getMessage()."\n";
}
?>