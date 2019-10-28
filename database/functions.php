<?php
require("init.php");

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
		$sth = $senpai->prepare("SELECT * FROM $table WHERE $column ='$value'");
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
	 print_r($result);
		$sth->closeCursor();
		echo ($result[$target])."\n";
		return ($result[$target]);
	} catch (PDOException $e) {
		echo "failed to get_specific".$e->getMessage()."\n";
	}
}

function update_specific($target, $new_var, $table, $column, $value){
try {
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("UPDATE $table SET $target='$new_var' WHERE $column=$value");
	$sth->execute();
	$sth->closeCursor();
} catch (PDOException $e) {
	echo "failed to update specific\n";
}
}

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
	echo "failed to find specific\n";
}
}

function delete_specific($table, $column, $value){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("DELETE FROM $table WHERE $column=$value");
	$sth->execute();
	$sth->closeCursor();
}

/////// for add user
function random_key($len){
	$seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
	shuffle($seed);
	$rand = '';
	foreach (array_rand($seed, $len) as $k) $rand .= $seed[$k];
	if (find_specific($rand, "vkey", "users"))
		return (random_key($len));
	return ($rand);
}
function hasher($password){
	$hashed = base64_encode($password);
	$ret = md5($hashed);
	return ($ret);
}

function add_user($username, $email, $display, $password){
try {
	if (find_specific($username,"username","users"))
		return ("username taken");
	if ($display)
		$display = base64_encode(file_get_contents($display));
	$senpai = Call_onee_san();
	$column = "(username,email,display,password,vkey)";
	$hashed_pass = hasher($password);
	$vkey = random_key("6");
	$onee_chan = $senpai->prepare("INSERT INTO users $column VALUES ('$username','$email','$display','$hashed_pass','$vkey')");
	$onee_chan->execute();
} catch (PDOException $e) {
	echo "failed to add user: ".$e->getMessage()."\n";
}
}

add_user("Shane","shane@gmail.com", "", "shane");
add_user("PC","PC@gmail.com", "", "PC");
add_user("marvy","marthen@gmail.com", "", "marvan");
add_user("Crillin","crillin@gmail.com", "", "DBZ");

get_specific("vkey", "users", "username", "PC");

?>