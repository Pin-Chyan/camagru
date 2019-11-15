
<?php
require("../header.php");
$msg = NULL;
if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];


    if (find_specific($vkey, "vkey", "users") and (get_specific("verified", "users", 'vkey', $vkey) != 1)) {
        //$new_key = random_key("6");
        $id = get_specific('id', "users", 'vkey', $vkey);
        update_specific("verified", 1, "users", 'id', $id);
        //update_specific("vkey", $new_key, "users", 'id', $id);
        $msg = "User validated";
        
    } else {
        $msg = "Link isn't valid anymore";
    }
} else {
    die("you did something wrong stupid");
}
?>
<html>
<head>
    <title>verify</title>
    <html lang="en">
    <link rel="stylesheet" href="../styles/login.css">
	<link rel="shortcut icon" href="#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
</body>
<center>
    <?php
        echo "<h2 style='color:white; background-color:brown; width: 10%; font-size: 20;'>".$msg."</h2>";
        echo "<a href='login.php'>Click here to return to login page</a>";
    ?>
</center>
</html>