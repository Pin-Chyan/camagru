<?php
include("database/init.php");
require("functions/image_functions.php");

session_start();

$senpai = Call_onee_san();
$_SESSION['username'] = 1;
if (isset($_POST['submit'])) {
	if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
		echo "<br />Please Select An Image.";
	} else {
		$image = $_FILES['imagefile']['tmp_name'];
		if (isset($_SESSION['username'])) {
			$id = $_SESSION['username'];
			upload_img($id, $image, "gallery");
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Upload image</title>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="imagefile">
			<br />
			<input type="submit" name="submit" value="Upload">
		</form>
	</body>
</html>
