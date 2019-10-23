<?php

require("init.php");

function Get_id($user){
	$conn = Call_onee_san();
	$sql = "SELECT id FROM users WHERE username = $user";
	$result = $conn->query($sql);
	return ($result);
}

?>