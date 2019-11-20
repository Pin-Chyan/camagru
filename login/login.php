<?php
    require("../header.php");
    $error = NULL;
    session_start();

    if (!empty($_SESSION['user_id']))
        header('location: ../index.php?page=1');
    else if (isset($_POST['submit'])) {
        $u = htmlspecialchars($_POST['usr'], ENT_QUOTES);
        $p = hasher($_POST['pwd']);

        if (find_specific($u, "username", "users") and find_specific($p, "password", "users")) {
            if (get_specific("verified", "users", 'username', $u) == 1) {
                $_SESSION['user_id'] = $u;
                header('location: ../index.php?page=1');
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
<link rel="shortcut icon" href="#">
<head>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <p class="message"><a href="forgot_password.php">Forgot password?</a></p>
                </form>
            </div>
        </div>
<center>
    <?php
        echo "<h2 style='color:white; background-color:red; width: 10%; font-size: 20;'>".$error."</h2>";
    ?>
</center>
</body>