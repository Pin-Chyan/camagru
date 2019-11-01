<?php

require("../header.php");

if (isset($_POST['submit'])) {
    $e = $_POST['email'];
    if (isset($e) and find_specific($e, "email", "users")) {
        if (get_specific("verified", "users", "email", $e) != 0) {
            $vkey = get_specific("vkey", "users", "email", $e);
            $subject = "Password reset";
            $msg = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <p>This email contains HTML Tags!</p>
            </body>
            </html>
            $header .= "MIME-Version: 1.0:"."\r\n";
            $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

            mail($e,$subject,$msg, $header);
            header('location: login.php');
        } else {
            echo "Please verify your account first";
        }
    } else {
        echo "User doesn't exist";
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
</body>