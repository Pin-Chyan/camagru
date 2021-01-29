<?php 
require_once("header.php");
session_start();

// tests add user functions
echo "<br/>Starting test";
add_user("dummy_acc","dummy@gmail.com", NULL, "none");

// verifies account
update_specific("verified", "1", "users", "username", "dummy_acc");

// testing image upload
echo "upload image test<br/>";
upload_img("4","images/Kirito.jpg","gallery");
upload_img("1","https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg","gallery");
upload_img("3","images/Kirito.jpg","gallery");
upload_img("2","images/senpai.jpeg","gallery");
upload_img("2","images/Kirito.jpg","gallery");
upload_img("4","images/senpai.jpeg","gallery");
upload_img("2","images/senpai.jpeg","gallery");

// testing comment functions
echo "add comment<br/>";
add_comment("1","1","is that kirito?");
add_comment("2","2","senpai is kawaii! ~GOD");
add_comment("3","3","bananas");
add_comment("4","4","this movie broke me!");
add_comment("2","4","i approve ~GOD");
add_comment("3","2","bananas");
add_comment("1","2","liam comments on asuna");
add_comment("4","2","pc comments on asuna");

remove_comment("1","1");
remove_comment("3","3");
remove_comment("3","2");

// testing likes
echo "add comment<br/>";
add_like("1","3");
add_like("3","4");
add_like("4","2");
add_like("3","1");
add_like("4","3");
add_like("2","3");
add_like("2","4");
add_like("1","5");
add_like("2","5");
add_like("4","5");

?>