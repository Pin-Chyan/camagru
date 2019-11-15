<?php
session_start();
require("../header.php");
$msg = NULL;
if (isset($_POST['submit'])) {
    $e = $_POST['email'];
    if (isset($e) and find_specific($e, "email", "users")) {
        if (get_specific("verified", "users", "email", $e) != 0) {
            $dir = $_SERVER['PHP_SELF'];
            $len = strrpos($dir, "forgot_password.php");
            $reg_dir = substr($dir, 0, $len);
            $reg_dir = $reg_dir."reset_pass.php";
            $page_dir = $_SERVER['HTTP_HOST'].$reg_dir;
            $vkey = get_specific("vkey", "users", "email", $e);
            $subject = "Password reset";
            $msg = "
            <html>
            <head>
            <title>Verify</title>
            </head>
            <body>
            <p>Click the link below to reset your password</p></br>
            <a href=\"http://$page_dir?vkey=$vkey\">Reset me senpai OwO</a>
            </body>
            </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($e,$subject,$msg, $headers);
            session_destroy();
            header('location: pass_sent.html');
        } else {
            $msg = "Please verify your account first";
        }
    } else {
        $msg = "User doesn't exist";
    }
}

?>
<html lang="en">
<link rel="stylesheet" href="../styles/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="#">
<head>
<title>Forgot Password</title>
<meta charset="UTF-8">
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
<center>
    <?php
        echo "<h2 style='color:white; background-color:brown; width: 10%; font-size: 20;'>".$msg."</h2>";
    ?>
</center>
</html>