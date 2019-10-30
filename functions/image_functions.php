<?php
function upload_img($userid,$imglocation){
try {
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocation));
    $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$binary_senpai','$userid')");
} catch (PDOException $e) {
    echo "fuck". $e->getMessage()."\n";
}
}

function get_img($id){
    $binary_senpai = get_specific("img","gallery","userid",$id);
    echo "<img src= 'data:image/jpeg; $binary_senpai' />";
}
?>