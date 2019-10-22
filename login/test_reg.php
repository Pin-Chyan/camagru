<?php
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
        $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');

        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);
        $e = $mysqli->real_escape_string($e);

        $vkey = md5(time().$u);

        $p = md5($p);
        $insert = $mysqli->query("INSERT INTO accounts(username,password,email,vkey)
        VALUES('$u','$p','$e','$vkey')");


        if ($insert) {
            $to = $e;
            $subject = "Email Verification";
            $msg = "<a href='http://localhost:8080/shared_camagru/login/verify.php?vkey=$vkey'>Register Account</a>";
            $header = "From pc";
            $header .= "MIME-Version: 1.0:"."\r\n";
            $header .= "Content-type:text/html;cahrset=UTF-8"."\r\n";

            mail($to,$subject,$msg, $header);

            header('location:thanks.php');
        }
        else {
            echo $mysqli->error;
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