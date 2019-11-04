<?php
    require("../header.php");
    $error = NULL;
    session_start();

    if (!empty($_SESSION['user_id']))
        header('location: home.html');
    else if (isset($_POST['submit'])) {
        $u = $_POST['usr'];
        $p = hasher($_POST['pwd']);

        if (find_specific($u, "username", "users") and find_specific($p, "password", "users")) {
            if (get_specific("verified", "users", 'username', $u) == 1) {
                $_SESSION['user_id'] = $u;
                header('location: home.html');
            } else {
                $error = "Please verify your account first";
            }
        } else {
            $error = "invalid username or password";
        }
    }
?>

<html lang="en">
<link rel="stylesheet" href="../styles/login.css">
<script src="../styles/login.js"></script>
<head>
<title>Login</title>
<meta charset="UTF-8">
<link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <div class="login-page">
            <div class="form">
                <!-- <form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form> -->
                <form class="login-form" action="" method="POST">
                    <input type="text" placeholder="username" name="usr"/>
                    <input type="password" placeholder="password" name="pwd"/>
                    <input type="SUBMIT" name="submit" value="Login"/>
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>
<center>
    <?php
        echo $error;
    ?>
</center>
</body>