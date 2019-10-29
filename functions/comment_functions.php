<?php
include_once("database/init.php");

function find_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
        $exec = $senpai->prepare("SELECT * FROM comments");
        $exec->execute();
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            print_r($res);
        }
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}
function add_comments($userid,$galleryid,$text){
    try {
        $senpai = Call_onee_san();
        $sql = "INSERT INTO comments (userid,galleryid,comment) VALUES ('$userid','$galleryid','$text')";
        $senpai->exec($sql);
        echo "comment added\n";
    }
    catch(PDOException $err){
        echo $arr."\n";
    }
}
// add_comments("1","1","comment added");
// add_comments("1","1","comment added");
// add_comments("1","1","comment added");
// add_comments("1","1","comment added");
// add_comments("1","1","comment added");
find_comment("1","1");
?>