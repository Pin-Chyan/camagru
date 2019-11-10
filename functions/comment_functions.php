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
function get_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
        $exec = $senpai->prepare("SELECT * FROM comments WHERE userid=$userid AND galleryid='$galleryid'");
        $exec->execute();
        if (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            return ($res['comment']);
        }
        else
            return (0);
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

function home_get_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $exec = $senpai->prepare("SELECT * FROM comments WHERE galleryid='$galleryid'");
        $exec->execute();
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            $comment = $res['comment'];
            $id = $res['id'];
            $name = get_specific("username","users","id",$res['userid']);
            echo "<text style=\"color:white\"> $name : $comment<text>";
            if ($res['userid'] == $userid){
                echo "<form  action=\"api/comment.php?\" method=\"POST\">
                    <input type=\"hidden\" name=\"action\" value=\"delete\">
                    <input type=\"hidden\" name=\"form_id\" value=\"$id\">
                    <input type=\"submit\" name=\"sub_action\" value=\"remove\">
                    </form>";
            }
            echo "<br/>";
        }
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}

?>