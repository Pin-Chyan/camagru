<?php

$error = NULL;

if (isset($_POST['submit'])) {
    $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');
    
    $email = $mysqli->real_escape_string($_POST['email']);
    $res = $mysqli->query("SELECT * FROM accounts WHERE email = '$email' LIMIT 1");
    if ($res->num_rows != 0) {
        $row = $res->fetch_assoc();

        if ($row['verified'] != 0) {
            $vkey = $row['vkey'];
            $to = $email;
            $subject = "Password reset";
            $msg = "<a href='http://localhost:8080/shared_camagru/login/reset_pass.php?vkey=$vkey'>New Password</a>";
            $header = "The camagru team";
            $header .= "MIME-Version: 1.0:"."\r\n";
            $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

            mail($to,$subject,$msg, $header);
            header('location: login.php');
        } else {
            $error = "User not verified yet";
        }
    } else {
        $error = "User doesn't exist";
    }
}

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Forgot password</title>
<link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="POST" action="">
    <table border="0" align="center" cellpadding="5">
        <tr>
            <td align="right">Please enter your email address:</td>
            <td><input type="EMAIL" name="email" required></td>
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