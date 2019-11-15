<?php
session_start();
require("../header.php");
$msg = NULL;
if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    if (find_specific($vkey, "vkey", "users")) {
        if (get_specific("verified", "users", 'vkey', $vkey) == 1) {
            if (isset($_POST['submit'])) {
                $p = $_POST['p'];
                $p2 = $_POST['p2'];
        
                if ($p2 != $p) {
                    $msg = "Password don't match";
                } else if (strongPassword($p, $msg) == 0);
                else {
                    $new_key = random_key("6");
                    $p = hasher($p);
                    $id = get_specific('id', "users", 'vkey', $vkey);
                    update_specific("password", $p, "users", 'id', $id);
                    update_specific("vkey", $new_key, "users", 'id', $id);
                    session_destroy();    
                    header('location: login.php');
                }
            }
        } else {
            $msg = "Please verify your account first";
        }
    } else {
        $msg = "Link isn't valid anymore ".$GET['vkey'];
    }
} else {
    header('location: forgot_password.php');
}

function strongPassword($pwd, &$error) {

    if (strlen($pwd) < 5) {
        $error = "Password must be at least 5 characters long!";
        return 0;
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $error = "Password must include at least one number!";
        return 0;
    }

    if (!preg_match("#[A-Z]+#", $pwd)) {
        $error = "Password must include at least one uppercase letter!";
        return 0;
    }
    return 1;
}

?>
<html>
<head>
<head>
    <title>Reset password</title>
    <html lang="en">
    <link rel="stylesheet" href="../styles/login.css">
	<link rel="shortcut icon" href="#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</head>
<body>
</body>
<center>
    <form method="POST" action="">
        <table border="0" align="center" cellpadding="5">
            <tr>
                <td align="right">New Password:</td>
                <td><input type="PASSWORD" name="p" required></td>
            </tr>
            <tr>
                <td align="right">Repeat Password:</td>
                <td><input type="PASSWORD" name="p2" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="submit" required/></td>
            </tr>
        </table>
    </form>
    <?php
        echo "<h2 style='color:white; background-color:brown; width: 10%; font-size: 20;'>".$msg."</h2>";
    ?>
</center>
</html>