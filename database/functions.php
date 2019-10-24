<?php
function get_specific($target, $table, $column, $value){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("SELECT * FROM $table WHERE $column=$value");
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	return ($result[$target]);
}

function update_specific($target, $new_var, $table, $column, $value){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("UPDATE $table SET $target='$new_var' WHERE $column=$value");
	$sth->execute();
}

function find_specific($var, $column, $table){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("SELECT $column FROM $table");
	$sth->execute();
	while ($result = $sth->fetch(PDO::FETCH_ASSOC)){
		if ($var == $result[$column])
			return (1);
	}
	return (0);
}

function delete_specific($table, $column, $value){
	$senpai = Call_onee_san();
	$sth = $senpai->prepare("DELETE FROM $table WHERE $column=$value");
	$sth->execute();
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
}
//////
?>