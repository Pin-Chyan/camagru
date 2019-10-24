<?php
$user = "senpai";
$pass = "noticeme";
$host = "localhost:3306";
$name = "senpai";
include "database_info.php";


//CREATE DATABASE
try{
    $conn = new PDO("mysql:host=$host",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE `".$name."`";
	$conn->exec("DROP DATABASE $name");
	$conn->exec($sql);
	echo "Senpai is born!\n";
}
catch(PDOException $e){
	echo "senpai didn't notice us ;(\n".$e->getMessage();
	die ();
}

///created user table
try {
	$senpai = Call_onee_san();
	$sql = "CREATE TABLE `users` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`username` VARCHAR(50) NOT NULL,
		`email` VARCHAR(100) NOT NULL,
		`password` VARCHAR(255) NOT NULL,
		`display` TEXT,
		`vkey` VARCHAR(50),
		`verified` tinyint(1) DEFAULT 0,
		`reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	$senpai->exec($sql);
	echo "Table users created\n";
}
catch (PDOException $e) {
	echo "User table died miserbly: ".$e->getMessage()."\n";
}

/*	Liams one incase he wants it.
	"id INT(11) AUTO_INCREMENT PRIMARY KEY";
	$tuser = "username VARCHAR(50)";
	$temail = "email VARCHAR(50)";
	$tdpic = "display TEXT";
	$tpass = "password VARCHAR(50)";
	$tvkey = "vkey VARCHAR(50)";
	$tveri = "verified tinyint(1) DEFAULT 0";
	$treg_date = "reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
*/

////image table (lets call this the gallery guys!)
$id = "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
$userid = "userid VARCHAR(50)";
$date = "upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
$image = "img64 TEXT";
$img_ex = "extention TEXT(10)";
$image_like = "likes INT(10)";
//$senpai->exec("DROP TABLE images");
$senpai->exec("CREATE TABLE gallery ($id, $userid, $author,$date,$image)");

///create like table
try {
    // hard connect cause dis shit aint workin
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `like` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `userid` INT(11) NOT NULL,
      `galleryid` INT(11) NOT NULL,
      `type` VARCHAR(1) NOT NULL,
      FOREIGN KEY (userid) REFERENCES users(id),
      FOREIGN KEY (galleryid) REFERENCES gallery(id)
    )";
    $dbh->exec($sql);
    echo "Table like created successfully\n";
} catch (PDOException $e) {
    echo "well shit bro!: ".$e->getMessage()."\n";
}
?>