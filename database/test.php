<?php
$user = "root";
$pass = "Busteristop117";
$host = "localhost:8080";

try {
	$conn = new PDO("mysql:host=$host",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "connected";
}
catch(PDOException $e){
	echo "senpai didn't notice us ;(\n".$e->getMessage();
	die ();
}
?>
