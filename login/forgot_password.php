<?php

$error = NULL;

if (isset($_POST['submit'])) {
    $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');

    $e = $mysqli->real_escape_string($_POST['e']);
    $res = $mysqli->query("SELECT * FROM accounts WHERE email = '$e' LIMIT 1");

    if ($res->num_ros == 1) {
        $error = "successs";
        $row = $res->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $vkey = $row['vkey'];

        if ($verified == 1) {
            $to = $email;
            $subject = "Password reset";
            $msg = "<a href='http://localhost:8080/shared_camagru/login/reset_pass.php?vkey=$vkey'>New Password</a>";
            $header = "The camagru team";
            $header .= "MIME-Version: 1.0:"."\r\n";
            $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

            mail($to,$subject,$msg, $header);

            header('Location: login.php');
        } else {
            $error = "User has not been verified yet";
        }
    } else {
        $error = "No such user exists on our system and res = '$res'";
    }
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>1Forgot password</title>
<link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="POST" action="">
    <table border="0" align="center" cellpadding="5">
        <tr>
            <td align="right">Please enter your email address:</td>
            <td><input type="EMAIL" name="e" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="submit" required/></td>
        </tr>
    </table>
</form>
<center>
    <?php
        echo $error;
    ?>
</center>
</body>