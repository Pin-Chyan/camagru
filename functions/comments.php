<?php

require("database/init.php");

function comment($userid, $imgSrc, $comment) {
	try {
		$senpai = Call_onee_san();
		$sql = $senpai->prepare("INSERT INTO comment(userid, galleryid, comment) SELECT :userid, id, :comment FROM gallery WHERE img = :img");
		$sql->execute(array(':userid' => $userid, ':comment' => $comment, ':img' => $imgSrc));
		// return (0);
	} catch (PDOException $e) {
      return ($e->getMessage());
    }
}