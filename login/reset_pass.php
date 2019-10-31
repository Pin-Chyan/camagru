<?php
require("../header.php");

if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    if (find_specific($vkey, "vkey", "users")) {
        if (get_specific("verified", "users", 'vkey', $vkey) == 1) {
            if (isset($_POST['submit'])) {
                $p = $_POST['p'];
                $p2 = $_POST['p2'];
        
                if ($p != $p2) {
                    echo "<p>Your passwords don't match</p>";
                } else {
                    $new_key = random_key("6");
                    $p = hasher($p);
                    $id = get_specific('id', "users", 'vkey', $vkey);
                    update_specific("password", $p, "users", 'id', $id);
                    update_specific("vkey", $new_key, "users", 'id', $id);
                    header('location: login.php');
                }
            }
        } else {
            echo "Please verify your account first";
        }
    } else {
        echo "Link isn't valid anymore";
    }
} else {
    header('location: forgot_password.php');
}
?>
<html>
<head>
    <title>Reset password</title>
</head>
<body>
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
</body>
</html>