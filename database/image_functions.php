<?php
function uploadimg($author,$imglocale){
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocale));
    $senpai->exec("INSERT INTO images (img64,author) VALUES ('$binary_senpai','$author')");
}

function get_img($tabel, $target, $value){
    $binary_senpai = get_specific("img64",$table,$target,$value);
    echo "<img src= 'data:image/jpeg; $binary_senpai' />";
}
?>