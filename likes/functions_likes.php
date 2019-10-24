<?php

function add_like($uid, $img, $type) {
	include "../database/database_info.php";
	include "../database/init.php";

try {
	$dbh = Call_onee_san;
	$query= $dbh->prepare("INSERT INTO `like`(userid, galleryid, type) SELECT :userid, id, :type FROM gallery WHERE img=:img");
	$query->execute(array(':userid' => $uid, ':img' => $img, ':type' => $type));
	return (0);
} 
catch (PDOException $e) {
	return ($e->getMessage());
	}
}