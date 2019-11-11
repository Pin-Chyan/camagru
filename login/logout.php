<?php
	session_start();
	session_destroy();
	header("Location: ../home_html.php?page=1");
?>
