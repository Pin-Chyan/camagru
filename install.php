<?php
session_start();
require("./header.php");
require("./Config/setup.php");
echo "\nRunning install\n";
add_user("CYKO","lmk30500@gmail.com", NULL, "waifu");
// add_user("CYKO","lmk30500@gmail.com", NULL, "waifu");
update_specific("verified", "1", "users", "username", "CYKO");
echo "\x1b[1m\n\t\t\t ADDING GOD\n\x1b[0m";
add_user("shane","shane@gmail.com", "images/Kirito.jpg", "shane");
update_specific("verified", "1", "users", "username", "shane");
echo "\nShane(GOD) added.\n";
add_user("PC","PC@gmail.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZ1Im8WuIZAVJ6v5IXV7tFIfi6K3YwAhKWnmNUb3qS7ZsJr0hz&s", "PC");
add_user("marvy","marthen@gmail.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4Ufw4pHLi7Uj3CMzdK72oGXqGHDCSR8Hm6eZw6glNU6HYBRKD&s", "marvan");
echo "\nupload image test\n";
upload_img("4","images/Kirito.jpg","gallery");
upload_img("1","https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg","gallery");
upload_img("3","images/Kirito.jpg","gallery");
upload_img("2","images/senpai.jpeg","gallery");
upload_img("2","images/Kirito.jpg","gallery");
upload_img("4","images/senpai.jpeg","gallery");
echo "\nadd comment\n\n";
add_comment("1","1","is that kirito?");
add_comment("2","2","senpai is kawaii! ~GOD");
add_comment("3","3","bananas");
add_comment("4","4","this movie broke me!");
add_comment("2","4","i approve ~GOD");
add_comment("3","2","bananas");
remove_comment("1","1");
remove_comment("3","3");
remove_comment("3","2");
add_like("1","3");
add_like("3","4");
add_like("4","2");
add_like("3","1");
add_like("4","3");
add_like("2","3");
add_like("2","4");
upload_img("2","images/senpai.jpeg","gallery");
add_like("1","5");
add_like("2","5");
add_like("4","5");
while ($i++ < 12)
    ver_img($i);
add_comment("1","2","liam comments on asuna");
add_comment("4","2","pc comments on asuna");

?>

