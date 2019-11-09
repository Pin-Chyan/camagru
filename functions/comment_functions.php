<?php
function find_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
        $exec = $senpai->prepare("SELECT * FROM comments");
        $exec->execute();
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            if ($res['userid'] == $userid && $res['galleryid'] == $galleryid)
                return (1);
        }
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}

function add_comment($userid,$galleryid,$comment){
    try {
        $senpai = Call_onee_san();
        $sql = "INSERT INTO comments (userid,galleryid,comment) VALUES ('$userid','$galleryid','$comment')";
        $senpai->exec($sql);
    }
    catch(PDOException $err){
        echo $err."\n";
    }
}

function remove_comment($userid,$galleryid){
	try{
		$senpai = call_onee_san();
		$sql = "DELETE FROM comments WHERE userid='$userid' AND galleryid='$galleryid'";
		$senpai->exec($sql);
		echo "comment removed\n";
	}
	catch (PDOException $err){
		echo $err."\n";
	}	
}
?>