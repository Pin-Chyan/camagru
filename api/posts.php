<?php
require_once("header.php");
session_start();

$q = $_REQUEST['q'];

if ($_POST["action"] === "delete") {
	delete_specific('gallery', 'id', $_POST["galleryid"]);
}


?>