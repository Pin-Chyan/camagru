<?php 
require_once("header.php");
session_start();

// tests add user functions
echo "<br/>Starting test";
add_user("dummy_acc","dummy@gmail.com", NULL, "none");
echo "<br/>";

// verifies account
update_specific("verified", "1", "users", "username", "dummy_acc");
echo "<br/>";

// testing image upload
echo "upload image test<br/>";
echo "<br/>";
upload_img("4","images/Kirito.jpg","gallery");
upload_img("1","https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg","gallery");
upload_img("3","images/Kirito.jpg","gallery");
upload_img("2","images/senpai.jpeg","gallery");
upload_img("2","images/Kirito.jpg","gallery");
upload_img("4","images/senpai.jpeg","gallery");
upload_img("2","images/senpai.jpeg","gallery");

// testing comment functions
echo "comment test<br/>";
add_comment("1","1","is that kirito?");
add_comment("2","2","senpai is kawaii! ~GOD");
add_comment("3","3","bananas");
add_comment("4","4","this movie broke me!");
add_comment("2","4","i approve ~GOD");
add_comment("3","2","bananas");
add_comment("1","2","liam comments on asuna");
add_comment("4","2","pc comments on asuna");
echo "comments added<br/>";

remove_comment("1","1");
echo "<br/>";

remove_comment("3","3");
echo "<br/>";

remove_comment("3","2");
echo "<br/>";
echo "<br/>";

// testing likes
echo "like test<br/>";
add_like("1","3");
echo "<br/>";
add_like("3","4");
echo "<br/>";
add_like("4","2");
echo "<br/>";
add_like("3","1");
echo "<br/>";
add_like("4","3");
echo "<br/>";
add_like("22","13");
echo "<br/>";
add_like("23","41");
echo "<br/>";
add_like("10","2");
echo "<br/>";
add_like("2","53");
echo "<br/>";
add_like("40","522");
echo "<br/>";

?>