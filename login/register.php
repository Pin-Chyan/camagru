<?php
require("../database/functions.php");
require("../database/init.php");

$error = NULL;

if (isset($_POST['submit'])) {
    $u = $_POST['u'];
    $p = $_POST['p'];
    $p2 = $_POST['p2'];
    $e = $_POST['e'];

    if (strlen($u) < 5)
        $error = "<p>Your username must be at least 5 characters long</p>";
    else if ($p2 != $p)
        $error .= "<p>Your passwords don't match</p>";
    else {
        $con = call_Onee_san();
        //$u = $con->real_escape_string($u);
        // $p = $con->real_escape_string($p);
        // $e = $con->real_escape_string($e);

        if (find_specific($u, "username", "users")) {
            $error = "Username already used";
        } else if (find_specific($e, "email", "users")) {
            $error = "Email already in use";
        } else {
            add_user($u, $e, $display, $p);
            $vkey = get_specific("vkey", "users", "username", $u);
            echo $vkey;
            // $subject = "Email Verification";
            // $msg = "<a href='http://localhost:8080/shared_camagru/login/verify.php?vkey=$vkey'>Register Account</a>";
            // $header = "From pc";
            // $header .= "MIME-Version: 1.0:"."\r\n";
            // $header .= "Content-type:text/html;charset=UTF-8"."\r\n";
            // mail($to,$subject,$msg, $header);
            // header('location: thanks.php');
        }
    }
    
}
?>
<html lang="en">
<head>
<title>1</title>
<link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="POST" action="">
    <table border="0" align="center" cellpadding="5">
        <tr>
            <td align="right">Username:</td>
            <td><input type="TEXT" name="u" required></td>
        </tr>
        <tr>
            <td align="right">Password:</td>
            <td><input type="PASSWORD" name="p" required></td>
        </tr>
        <tr>
            <td align="right">Repeat Password:</td>
            <td><input type="PASSWORD" name="p2" required></td>
        </tr>
        <tr>
            <td align="right">Email Address:</td>
            <td><input type="EMAIL" name="e" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Register" required/></td>
        </tr>
    </table>
</form>
<center>
    <?php
        echo $error;
    ?>
</center>
</body>