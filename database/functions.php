<?php

require("init.php");

function Get_id($user){
	$conn = Call_onee_san();
	$sql = "SELECT id FROM users";
	$result = $conn->query($sql);
	return ($result);
}

function get_specific($target, $table, $pos, $value){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("SELECT * FROM $table WHERE $pos=$value");
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	return ($result[$target]);
}
?>