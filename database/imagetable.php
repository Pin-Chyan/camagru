<?php
function conn(){
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
        $senapi = new PDO("mysql:host=$host;dbname=senpai",$user,$pass);
        $senpai->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "\nconnected";
    }
    catch(PDOException $e){
        echo "\nok fuck";//echo "\n".$e->getMessage();
    }
    return ($senpai);
}
$senpai = conn();
$id = "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
$author = "author VARCHAR(10)";
$date = "upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
$image = "img64 TEXT";
$img_ex = "extention TEXT(10)";
$image_like = "likes INT(10)";
$senpai->exec("CREATE TABLE images ($id,$author,$date,$image)");

function uploadimg($senpai,$author,$imglocale){
    $binary_senpai = base64_encode(file_get_contents($imglocale));
    $senpai->exec("INSERT INTO users (author,img64) VALUES ('$bianry_senpai','$author')");
}

$mai = "mai-san";
uploadimg($senpai,$mai,"senpai.jpeg");
?>