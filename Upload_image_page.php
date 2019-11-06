<?php
require("header.php");

session_start();

$senpai = Call_onee_san();
if (isset($_POST['submit'])) {
	if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
		echo "<br />Please Select An Image.";
	} else {
		$image = $_FILES['imagefile']['tmp_name'];
		if (isset($_SESSION['user_id'])) {
			$id = $_SESSION['user_id'];
			upload_img($id , $image, "users");
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
