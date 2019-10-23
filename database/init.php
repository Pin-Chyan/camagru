<?php

function call_Onee_san() {

$user = "senpai";
$pass = "noticeme";
$host = "localhost:3306";
$name = "senpai";
try{
    $conn = new PDO("mysql:host=$host",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected\n";
}
catch(PDOException $e){
    echo "ok fuck\n";//echo "\n".$e->getMessage();
}
$conn->exec("DROP DATABASE $name");
$conn->exec("CREATE DATABASE $name");
try{
    $senpai = new PDO("mysql:host=$host;dbname=senpai",$user,$pass);
    $senpai->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected\n";
}
catch(PDOException $s){
    echo "ok fuck\n";//echo "\n".$e->getMessage();
}
return ($senpai);
}

///created user table
$def = 50;
$id = "id INT(11) AUTO_INCREMENT PRIMARY KEY";
$tuser = "username VARCHAR($def)";
$temail = "email VARCHAR($def)";
$tdpic = "display TEXT";
$tpass = "password VARCHAR($def)";
$tvkey = "vkey VARCHAR($def)";
$tveri = "verified tinyint(1)";
$treg_date = "reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
$senpai->exec("CREATE TABLE users ($id,$tuser,$temail,$tdpic,$tpass,$tvkey,$tveri,$treg_date)");


////upload senpai bot
$username = "mai";
$email = "senpai@bunnygirlsenpai.com";
$dpic = base64_encode(file_get_contents("senpai.jpeg"));
$password = "bunnygirl";
$table = "(username,email,display,password)";
$vars = "('$username','$email','$dpic','$password')";
$senpai->exec("INSERT INTO users $table VALUES $vars");
?>