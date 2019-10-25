<?php
function call_Onee_san() {
$user = "senpai";
$pass = "noticeme";
$host = "localhost:3306";
$name = "senpai";
try{
    $senpai = new PDO("mysql:host=$host;dbname=senpai",$user,$pass);
    $senpai->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "ok fuck\n".$e->getMessage();
    die ();
}
return ($senpai);
}
?>