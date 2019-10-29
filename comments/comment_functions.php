<?php
include_once("database/init.php");

function add_comments($userid,$galleryid,$text){
    try {
        $senpai = Call_onee_san();
        $sql = "INSERT INTO comments (userid,galleryid,comment) VALUES ('$userid','$galleryid','$text')";
        $senpai->exec($sql);
        echo "comment added\n";
    }
    catch(PDOException $err){
        echo $err."\n";
    }
}

add_comments("1","1","this is a comment");
?>