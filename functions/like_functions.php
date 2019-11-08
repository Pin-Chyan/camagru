<?php

function find_id($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $exec = $senpai->prepare("SELECT * FROM `like`");
        $exec->execute();
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            if ($res['galleryid'] == $galleryid && $res['userid'] == $userid) {
				return (1);
			}
		}
		return (0);
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}
function add_like($userid,$galleryid){
	try{
		$senpai = call_onee_san();
		if (find_id($userid,$galleryid)){
			echo "you already likes this fam\n";
			return (0);
		}
		$sql = "INSERT INTO `like` (userid,galleryid) VALUES ('$userid','$galleryid')";
		$senpai->exec($sql);
		echo "image liked\n";
	}
	catch(PDOException $e){
		echo $e."\n";
	}
}
function remove_like($userid,$galleryid){
	try{
		$senpai = call_onee_san();
		$sql = "DELETE FROM `like` WHERE userid='$userid' AND galleryid='$galleryid'";
		$senpai->exec($sql);
		echo "like removed\n";
	}
	catch (PDOException $err){
		echo $err."\n";
	}
}

function get_likes($userid,$galleryid){
	try{
		$ammount = 0;
		$senpai = call_onee_san();
		if ($userid){
			$res = $senpai->prepare("SELECT userid,galleryid FROM `like`");
			$res->execute();
			while ($arr = $res->fetch(PDO::FETCH_ASSOC)){
				if ($arr['userid'] == $userid && $arr['galleryid'] == $galleryid)
					return (1);
			}
			return (0);
		}
		else{
			$res = $senpai->prepare("SELECT galleryid FROM `like`");
			$res->execute();
			while ($arr = $res->fetch(PDO::FETCH_ASSOC)){
				if ($arr['galleryid'] == $galleryid)
					$ammount++;
			}
			return ($ammount);
		}
		return $ammount;
	}
	catch (PDOException $e){
		echo $e."\n";
	}
}
?>