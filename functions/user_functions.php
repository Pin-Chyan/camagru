<?php
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
		return (-1);
	if ($display)
		$new = base64_encode(file_get_contents($display));
	$senpai = Call_onee_san();
	$column = "(username,email,display,password,vkey)";
	$hashed_pass = hasher($password);
	$vkey = random_key("6");
	$onee_chan = $senpai->prepare("INSERT INTO users $column VALUES ('$username','$email','$new','$hashed_pass','$vkey')");
	$onee_chan->execute();
} catch (PDOException $e) {
	echo "failed to add user: ".$e->getMessage()."\n";
}
}
?>