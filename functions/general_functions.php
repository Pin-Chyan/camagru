<?php
/* ok for get_specific:
	target = what you want to get.
	table = the table its in.
	coloumn = the coloum of the value you have to offer.
	value = any other reference to what you want, example. 
	you want the vkey the give the username for who you want the vkey of,
	and the column will be username
*/
function get_specific($target, $table, $column, $value){
	try {
		$senpai = Call_onee_san();
		$sth = $senpai->prepare("SELECT * FROM $table WHERE $column='$value'");
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		if (!$result[$target])
			return (0);
		$sth->closeCursor();
		return ($result[$target]);
	} catch (PDOException $e) {
		echo "failed to get_specific".$e->getMessage()."\n";
	}
}
function update_specific($target, $new_var, $table, $column, $value){
try {
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("UPDATE $table SET $target='$new_var' WHERE $column='$value'");
	$sth->execute();
	$sth->closeCursor();
} catch (PDOException $e) {
	echo "failed to update specific $e\n";
}
}

<<<<<<< HEAD
function is_liked($userid, $galleryid, $table) {
	$senpai = Call_onee_san();
	$stmt = $senpai->prepare("SELECT * FROM $table");
	$stmt->execute();
	$arrays = $stmt->fetch(PDO::FETCH_ASSOC);
	foreach($arrays as $array) {
		if ($array['userid'] == $userid && $array['galleryid'] == $galleryid)
			return (1);
	}
	return (0);
}
=======

>>>>>>> 4a5cf2cfd9ec41f08902c1c6cba20e10bfb0d775

function find_specific($var, $column, $table){
try {
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("SELECT $column FROM $table");
	$sth->execute();
	while ($result = $sth->fetch(PDO::FETCH_ASSOC)){
		if ($var == $result[$column])
			return (1);
	}
	$sth->closeCursor();
	return (0);
} catch (PDOException $e) {
	echo "failed to find specific $e\n";
}
}

function delete_like($table, $colomn1, $userid, $column2, $galleryid){
try{
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("DELETE FROM $table WHERE $column1=$userid AND $column2=$galleryid");
	$sth->execute();
	$sth->closeCursor();
}
catch (PDOException $e) {
	echo "failed to delete Like $e\n";
}
}

function delete_specific($table, $column, $value){
try{
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("DELETE FROM `$table` WHERE $column='$value'");
	$sth->execute();
	$sth->closeCursor();
}
catch (PDOException $e) {
	echo "failed to delete specific $e\n";
}
}
?>


