<?php
session_start();
require("./header.php");
require("./database/install.php");
echo "\nadd users test\n";
add_user("CYKO","lmk310500@gmail.com", NULL, "waifu");
upload_img("CYKO","images/Kirito.jpg","user");
add_user("Shane","shane@gmail.com", "images/Kirito.jpg", "shane");
add_user("PC","PC@gmail.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZ1Im8WuIZAVJ6v5IXV7tFIfi6K3YwAhKWnmNUb3qS7ZsJr0hz&s", "PC");
add_user("marvy","marthen@gmail.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4Ufw4pHLi7Uj3CMzdK72oGXqGHDCSR8Hm6eZw6glNU6HYBRKD&s", "marvan");
add_user("Crillin","crillin@gmail.com", "https://www.google.com/imgres?imgurl=https%3A%2F%2Flookaside.fbsbx.com%2Flookaside%2Fcrawler%2Fmedia%2F%3Fmedia_id%3D1643466299096087&imgrefurl=https%3A%2F%2Fwww.facebook.com%2Fkirito.soloplayer.realblackswordsman%2Fphotos%2Fa.426226597486736%2F1643466299096087%2F%3Ftype%3D3&docid=LmwPDBeLW-hsAM&tbnid=ERj7eFL3alLTxM%3A&vet=1&w=273&h=273&bih=1257&biw=2560&ved=2ahUKEwimvMTp98HlAhXbAGMBHdCNBK4QxiAoBXoECAEQIQ&iact=c&ictx=1", "DBZ");
echo "\nupload image test\n";
upload_img("4","images/Kirito.jpg","gallery");
upload_img("1","https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg","gallery");
upload_img("4","images/Kirito.jpg","gallery");
upload_img("4","images/senpai.jpeg","gallery");
//upload_img("4","https://www.google.com/imgres?imgurl=https%3A%2F%2Fcdn.vox-cdn.com%2Fthumbor%2FPdZbmB57vB9M-oFxApdoaI3oPF0%3D%2F0x0%3A1920x1080%2F1200x800%2Ffilters%3Afocal(807x387%3A1113x693)%2Fcdn.vox-cdn.com%2Fuploads%2Fchorus_image%2Fimage%2F65162399%2Fply0947_fall_reviews_2019_tv_anime.0.jpg&imgrefurl=https%3A%2F%2Fwww.polygon.com%2F2019%2F9%2F3%2F20829817%2Ffall-2019-anime-season-preview-my-hero-academia-food-wars-psycho-pass&docid=iU5a_lH4UwfQTM&tbnid=6icyNnlu5kdGOM%3A&vet=10ahUKEwjrwrG08MHlAhVnUhUIHQA4AiIQMwh5KAEwAQ..i&w=1200&h=800&bih=1257&biw=2560&q=anime&ved=0ahUKEwjrwrG08MHlAhVnUhUIHQA4AiIQMwh5KAEwAQ&iact=mrc&uact=8");
//upload_img("4","https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.sbs.com.au%2Fpopasia%2Fsites%2Fsbs.com.au.popasia%2Ffiles%2Fstyles%2Ffull%2Fpublic%2Fyour-name-3.jpg%3Fitok%3DWmmaGvg9%26mtime%3D1507775696&imgrefurl=https%3A%2F%2Fwww.sbs.com.au%2Fpopasia%2Fblog%2F2017%2F10%2F12%2Fvotes-are-top-100-greatest-anime-all-time-voted-you&docid=YODnBi8zvHwVqM&tbnid=tcfgCLJ6ZFyC6M%3A&vet=10ahUKEwjrwrG08MHlAhVnUhUIHQA4AiIQMwibASgWMBY..i&w=704&h=396&bih=1257&biw=2560&q=anime&ved=0ahUKEwjrwrG08MHlAhVnUhUIHQA4AiIQMwibASgWMBY&iact=mrc&uact=8");
echo "\nadd comment\n\n";
add_comment("1","1","is that kirito?");
add_comment("2","2","senpai is kawaii!");
add_comment("3","3","bananas");
add_comment("4","4","this movie broke me!");
add_comment("2","4","i am heartless");
add_comment("3","2","bananas");
echo "\nremove comment test\n\n";
remove_comment("1","1");
remove_comment("2","2");
// remove_comment("3","3");
// remove_comment("4","4");
remove_comment("2","4");
remove_comment("3","2");
echo "\nlike add test\n\n";
add_like("1","3");
add_like("1","3");
add_like("2","3");
add_like("3","4");
add_like("4","2");
add_like("2","1");
add_like("3","1");
add_like("4","3");
add_like("2","4");
add_like("2","3");
add_like("3","4");
add_like("4","2");
add_like("2","1");
add_like("3","1");
add_like("4","3");
add_like("2","4");
echo "\nlike remove test\n\n";
add_like("1","3");
remove_like("1","3");
add_like("1","3");
remove_like("2","3");
remove_like("4","3");
remove_like("2","3");
remove_like("4","2");
echo "\nget likes test\n\n";
upload_img("2","images/senpai.jpeg","gallery");
add_like("1","5");
add_like("2","5");
add_like("4","5");
echo get_likes(NULL,"5")." likes \n";
echo get_likes("1","5")." likes \n";
echo get_likes("3","5")." likes \n";
echo "\nget image test\n\n";
//get_img("1",NULL);
retrieve_img(3,1,"this is a class");
retrieve_img(3,2,"this is a class");
retrieve_img(3,3,"this is a class");
//max_img();
echo "\n\n fimg test \n\n";
$i = 0;
while ($i++ < 12)
    echo ver_img($i)."\n";
home_img(5,1,"column middle image");
echo "\n\npage no test\n\n";
echo $GLOBALS['page'];
echo "\n\n url test\n\n";
echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?page=1";
echo "\n\n".max_img()."img test\n";
home_img(2,1,"");
home_img(2,2,"");
home_img(2,3,"");
java_comment(2,1);
java_comment(2,2);
java_comment(2,3);
echo "\n\npager test\n";
pager_images(2,1);
pager_images(2,2);
pager_images(2,3);
echo "\n\nsession test\n\n<br/>";
print_r($_SESSION);
?>