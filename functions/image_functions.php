<?php

include("database/init.php");
require("functions/functions.php");

function upload_img($id,$imglocal){
try {
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocal));
    $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$binary_senpai','$id')");
} catch (PDOException $e) {
    echo "fuck". $e->getMessage()."\n";
}
}

function get_img($id){
    $binary_senpai = get_specific("img","gallery","userid",$id);
    echo "<img src= 'data:image/jpeg; $binary_senpai' />";
}
?>