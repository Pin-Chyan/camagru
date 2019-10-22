<?php
$user = "senpai";
$pass = "noticeme";
$host = "localhost:3306";
$name = "senpai";
try{
    $conn = new PDO("mysql:host=$host",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "\nconnected";
}
catch(PDOException $e){
    echo "\nok fuck";//echo "\n".$e->getMessage();
}
$conn->exec("DROP DATABASE $name");
$conn->exec("CREATE DATABASE $name");
try{
    $senpai = new PDO("mysql:host=$host;dbname=senpai",$user,$pass);
    $senpai->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "\nconnected";
}
catch(PDOException $s){
    echo "\nok fuck";//echo "\n".$e->getMessage();
}
$def = 50;
$tuser = "username VARCHAR($def)";
$temail = "email VARCHAR($def)";
$tdpic = "display TEXT";
$tpass = "password VARCHAR($def)";
$senpai->exec("CREATE TABLE users ($tuser,$temail,$tdpic,$tpass)");

////upload senpai bot
$username = "mai";
$email = "@noneofyourbusiness.com";
$dpic = base64_encode(file_get_contents("senpai.php"));
$password = "bunnygirl";
$table = "(username,email,display,password)";
$vars = "('$username','$email','$dpic','$password')";
$senpai->exec("INSERT INTO users $table VALUES $vars");
?>