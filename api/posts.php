<?php
require_once("../header.php");
session_start();

$id = $_REQUEST['id'];
$action = $_REQUEST['action'];

if ($action === "delete") {
 	delete_specific("gallery", "id", $id);
}

?>