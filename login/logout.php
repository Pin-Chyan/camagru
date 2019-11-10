<?php
	session_start();
	unset($_SESSION['user_id']);
	header("Location: ../home_html.php?page=1");
?>
