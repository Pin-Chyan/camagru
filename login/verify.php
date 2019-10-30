<?php
require("../header.php");

if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];

    if (find_specific($vkey, "vkey", "users")) {
        $new_key = random_key("6");
        //update_specific("verified", 1, "users", "vkey", $vkey);
        //update_specific("vkey", $new_key, "users", "vkey", $vkey);
        echo "User validated";

        //get_specific("vkey", "users", "username", $u);
        //get_specific($target, $table, $column, $value)
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