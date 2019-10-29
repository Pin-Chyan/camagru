<?php

require ("database/init.php");

function find_id($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
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

// takes userid, galleryid and type then adds the like
function add_like($userid, $img, $type) {
	try {
		$senpai = Call_onee_san();
		if (find_id($userid, $galleryid)) {
			echo "Already liked\n";
			return (0);
		}
		$temp = base64_encode(file_get_contents($img));
		$sql = $senpai->prepare("INSERT INTO `like`(userid, galleryid, type) SELECT :userid, id, :type FROM gallery WHERE img=:img");
		$sql->execute(array(':userid' => $userid, ':img' => $temp, ':type' => $type));
		return (0);
	} 
	catch (PDOException $e) {
		return ($e->getMessage());
	}
}

//Updates the likes table
function update_like ($userid, $img, $type) {
	try {
		$dbh = Call_onee_san();
		$query = $dbh->prepare("UPDATE `like`, gallery SET `like`.type=:type WHERE gallery.img=:img AND gallery.userid=:userid AND `like`.galleryid=gallery.id");
		$query->execute(array(':userid' => $userid, ':img' => $img, ':type' => $type));
		return (0);
	}
	catch (PDOException $e) {
		return ($e->getMessage());
	}
}

function get_like($userid, $img) {
	try {
		$senpai = Call_onee_san();
		$query= $senpai->prepare("SELECT type FROM `like`, gallery WHERE `like`.userid=:userid AND `like`.galleryid=gallery.id AND gallery.img=:img");
		$query->execute(array(':userid' => $userid, ':img' => $img));
		$val = $query->fetch();
		$query->closeCursor(); // This bullshit is ajax stuff, basicly resets the function to the server can call it again or run a diff func.
		echo "The likes are = $val\n";
		return ($val);
	  } catch (PDOException $e) {
		return ($e->getMessage());
	  }
  }

function count_likes($img) {
	try {
		$senpai = Call_onee_san();
		$query= $senpai->prepare("SELECT type FROM `like`, gallery WHERE `like`.galleryid=gallery.id AND gallery.img=:img AND `like`.type='L'");
		$query->execute(array(':img' => $img));
		$count = 0;
		while ($val = $query->fetch()) {
		  $count++;
		}
		$query->closeCursor();
		return ($count);
	  }
	  catch (PDOException $e) {
		return ($e->getMessage());
	  }
}

add_like("1", "/images/Kirito.jpg", ".jpg");

?>