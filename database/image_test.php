<?php
/*
if ($senpai = fopen("senapi.jpeg","wb")){
    echo "\nsenpai loaded";
    echo $senpai;
}*/
$senpai_base64 = base64_encode(file_get_contents("https://steamuserimages-a.akamaihd.net/ugc/6186039759118560697/4C9BB727658881A192E51316A7838F8E3F1A7CBB/"));
echo $senpai_base64;
?>