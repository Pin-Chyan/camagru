<?php
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

function get_key($session){
	try{
		$senpai = Call_onee_san();
		$sth = $senpai->prepare("SELECT * FROM $keys WHERE $userid ='$session'");
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		if (isset($result['key']))
			return (0);
		else
			return ($result['key']);
	}
	catch (PDOExeption $e){
		echo "unable to get session key";
	}
}
?>