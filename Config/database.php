<?php
function call_Onee_san() {
    $DB_DSN = "localhost:3306";
    $DB_USER = "root";
    $DB_PASSWORD = "root";
    // $user = "senpai";
    // $pass = "noticeme";
    // $host = "localhost:3306";
    // $name = "senpai";
    try{
        $senpai = new PDO("mysql:host=$DB_DSN;dbname=senpai",$DB_USER,$DB_PASSWORD);
        $senpai->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "ok fuck\n".$e->getMessage();
        die ();
    }
    return ($senpai);
}
?> 