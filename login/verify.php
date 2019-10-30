<?php
require("../header.php");

if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];


    if (find_specific($vkey, "vkey", "users") and (get_specific("verified", "users", 'vkey', $vkey) != 1)) {
        //$new_key = random_key("6");
        $id = get_specific('id', "users", 'vkey', $vkey);
        update_specific("verified", 1, "users", 'id', $id);
        //update_specific("vkey", $new_key, "users", 'id', $id);
        echo "User validated";
        
    } else {
        echo "Link invalid isn't valid anymore";
    }
} else {
    die("you did something wrong stupid");
}
?>
<html>
<head>
    <title>verify</title>
</head>
<body>

</body>
</html>