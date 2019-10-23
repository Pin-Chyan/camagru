<?php
require("database/functions.php");
require("database/image_functions.php");
require("database/init.php");
//require("database/init.php");

$img = base64_encode(file_get_contents("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGHvIcfFjiJsvHdeVjjpszdHRWdw6I5JFsOIq5zrCO2gF4TJ405Q&s"));
add_user("mai","enpai@bunnygirlsenpai.com",$img,"bunnygirl");
add_user("bannana","nearleaves@branch.tree",NULL,"fresh");
add_user("bilko","wow@laptop.farming",NULL,"asiantoken");
add_user("asain","southafrica@chinatown.ming",NULL,"nihon");
add_user("CYKO","makingdatabases@wethinkcode.he.he",NULL,"ilovewaifusocks");

uploadimg("CYKO","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyJVwC3JQv6fEO5taH4KX1FpvBAcIhwYLWSzwRrRbXNRNy8GYV&s");
uploadimg("CYKO","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGHvIcfFjiJsvHdeVjjpszdHRWdw6I5JFsOIq5zrCO2gF4TJ405Q&s");

?>