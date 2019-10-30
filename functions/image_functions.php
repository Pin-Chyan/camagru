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

function get_img($galleryid,$class){
    $binary_senpai = get_specific("img","gallery","id",$galleryid);
    //$binary_senpai = "this is the image";
    if ($class)
        echo "<img class=\"$class\" src='data:image/jpeg;base64, $binary_senpai' />";
    else
        echo "<img src='data:image/jpeg;base64, $binary_senpai' />";
    }
?>