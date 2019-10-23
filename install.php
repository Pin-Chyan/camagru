<?php
$servername = "localhost:3306";
$username = "senpai";
$password = "noticeme";

try {
	$conn = new PDO("mysql:host=$servername;dbname=senpai", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "The database have been created!\n";
}
catch (PDOException $e) {
	echo "Well shit, PDO didn't work: ". $sql. "<br>". $e->getMessage();
}
$conn = null;

$sql = "CREATE_TABLE User_card ( 
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(30) NOT NULL,
	Lastname VARCHAR(30) NOT NULL,
	Email VARCHAR(50),
	Image TEXT
)";

if ($conn->query($sql) === TRUE) {
	echo "table User_card Created\n";
}
else
	echo "you failed\n";

?>