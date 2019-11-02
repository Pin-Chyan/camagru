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
    if ($binary_senpai == false)
        return (0);
    //$binary_senpai = "this is the image";
    if ($class)
        echo /*"img class ".$galleryid."\n";*/"<img class=\"$class\" src='data:image/jpeg;base64, $binary_senpai' />";
    else
        echo /*"img ncl ".$galleryid."\n";*/"<img src='data:image/jpeg;base64, $binary_senpai' />";
    return (1);
}

function max_img(){
    $senpai = call_onee_san();
    $new = $senpai->prepare("SELECT id FROM gallery");
    $new->execute();
    $max = 0;
    while ($column = $new->fetch(PDO::FETCH_ASSOC))
        if ($max < $column['id'])
            $max = $column['id'];
    $new->closeCursor();
    echo $max."\n";
}

function retrieve_img($amm,$page_no,$class){
    $i = ($amm * ($page_no - 1)) + 1;
    $amm += $i;
    while ($i < $amm)
    {
        //echo "fetch img ".$i."\n";
        if (get_img("$i",$class) == 0)
        {
            echo "\nno more images";
            return (0);
        }
        $i++;
    }
}
?>