<?php

require("init.php");

function Get_id($user){
	$conn = Call_onee_san();
	$sql = "SELECT id FROM users WHERE username = $user";
	$result = $conn->query($sql);
	return ($result);
}


//Get anything you want from any table (the key is the coloumn name and
// the name is the row association i.e i have the username but i want the id)
function get_specific($name,$key,$table) {
	$conn = Call_onee_san();
	$sth = $conn->prepare("SELECT $name FROM $table");
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_OBJ);
	return ($result);
}

Get_id("")
?>