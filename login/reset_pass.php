<?php

$error = NULL;

if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');

    $res = $mysqli->query("SELECT password,vkey FROM accounts WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
    if ($res->num_rows == 1) {
        if (isset($_POST['submit'])) {
            $p = $_POST['p'];
            $p2 = $_POST['p2'];
            
            if ($p != $p2) {
                $error = "<p>Your passwords don't match</p>";
            } else {
                $p = $mysqli->real_escape_string($p);
                $p = md5($p);
                $update = $mysqli->query("UPDATE accounts SET password = '$p' WHERE vkey = '$vkey' LIMIT 1");
                header('location: login.php');
            }
        }
    } else {
        echo "Stop messing around you fool";
    }
} else {
    die("you did something wrong stupid");
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
<center>
    <?php
        echo $error;
    ?>
</center>
</html>