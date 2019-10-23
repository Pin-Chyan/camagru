<?php
/*
if ($senpai = fopen("senapi.jpeg","wb")){
    echo "\nsenpai loaded";
    echo $senpai;
}*/
$senpai_base64 = base64_encode(file_get_contents("senpai.jpeg"));
echo $senpai_base64;
?>