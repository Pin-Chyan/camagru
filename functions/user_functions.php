<?php
/////// for add user

function add_user($username, $email, $display, $password){
try {
	if (find_specific($username,"username","users"))
		return (-1);
	// if ($display)
	// 	$new = base64_encode(file_get_contents($display));
	$senpai = Call_onee_san();
	$column = "(username,email,display,password,vkey)";
	$hashed_pass = hasher($password);
	$vkey = random_key("6");
	if (!$display)
		$display = '#';
	$onee_chan = $senpai->prepare("INSERT INTO users $column VALUES ('$username','$email','$display','$hashed_pass','$vkey')");
	$onee_chan->execute();
	if ($display && $display != "#") {
		$id = get_specific('id', 'users', 'username', $username);
		upload_img($id , $display, 'users');
	}
} catch (PDOException $e) {
	echo "failed to add user: ".$e->getMessage()."\n";
}
}

function remove_user($id){
	try{
		delete_specific("users", "id", $id);
	}
	catch (PDOException $e){
		echo "unable to remove user $e\n";
	}
}

?>