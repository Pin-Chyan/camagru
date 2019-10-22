<?php
if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');

    $res = $mysqli->query("SELECT verified,vkey FROM accounts WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");    
    if ($res->num_rows == 1) {
        $update = $mysqli->query("UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if ($update) {
            echo "Your account has been verified";
        } else {
            echo $mysqli->error;
        }
    } else {
        echo "This account is invalid or already used";
    }
} else {
    die("you did something wrong stupid");
}
?>
<html>
<head>
    <title>verify</title>
</head>
<body>

</body>
</html>