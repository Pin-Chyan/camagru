<?php
session_start();
require_once("../header.php");


if (!isset($_POST['action'])) {
	output_error("No action supplied", 400);
}

if ($_POST['action'] === "delete") {
	
	if (!isset($_SESSION['user_id'])) {
		output_error("Not Logged in", 401);
	}
	else if (delete_specific('gallery', 'id', $_POST['galleryid']) && $_SESSION['user_id'])
		print("Post Deleted succefully!" . PHP_EOL);
	else
		output_error("Failed to Delete post!", 400);
}


?>