<?php
require("init.php");

function uploadimg($author,$imglocale){
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents("database/senpai.jpeg"));
    $senpai->exec("INSERT INTO images (img64,author) VALUES ('$bianry_senpai','$author')");
}

uploadimg("mai","senpai.jpeg");
?>