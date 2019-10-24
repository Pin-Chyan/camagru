<?php
require("database/functions.php");
require("database/init.php");

$vkey = get_specific("vkey", "users", "username", "banana");
echo "$vkey"."\n";

?>