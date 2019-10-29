<?php

require("/database/init.php");
try {
	$senpai = Call_onee_san();
} catch (PDOException $e){
	die('Unable to connect with the database');
}

?>

<!DOCTYPE html>
<html>
	<head>
	<title>Upload image</title>
	</head>
	<body>
	<form method='post' action='' enctype='multipart/form-data'>
  	<input type='file' name='files[]' multiple />
  	<input type='submit' value='Submit' name='submit' />
	</form>
	</body>
</html>
