<?php
$servername = "senpai";
$username = "senpai";
$password = "haven";

try {
	$conn = new PDO("mysql:host=$servername;dbname=TheOnePiece", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE TheOnePiece";
	$conn->exec($sql);
	echo "The One Piece has been found!\n";
}
catch (PDOException $e) {
	echo "Well shit, PDO didn't work: ". $sql. "<br>". $e->getMessage();
}
$conn = null;

?>


//users
id 			int;
username	text;
email		text;
image		blob;
password	password;

//Images
images		blob;
id			int???