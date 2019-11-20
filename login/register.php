<?php
require("../header.php");
$error = NULL;
if (isset($_POST['submit'])) {
    $u = $_POST['usr_name'];
    $p = $_POST['pwd'];
    $p2 = $_POST['pwd2'];
    $e = $_POST['email'];

    if (strlen($u) > 49)
        $error = "username to long";
    else if ($p2 != $p)
        $error = "Password don't match";
    else if (strongPassword($p, $error) == 0);
    else {
        if (find_specific($u, "username", "users") == 1) {
            $error = "Username has been taken";
        } else if (find_specific($e, "email", "users")) {
            $error = "Email already in use";
        } else {
            $img = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSl9A5F4slh_zasbCOpP6V0TSWIss1o6F7Lcsp9w3xyNXlglxgZ";
            add_user($u, $e,$img, $p);
            $u = htmlspecialchars(strip_tags($u), ENT_QUOTES);
            $dir = $_SERVER['PHP_SELF'];
            $len = strrpos($dir, "register.php");
            $reg_dir = substr($dir, 0, $len);
            $reg_dir = $reg_dir."verify.php";
            $page_dir = $_SERVER['HTTP_HOST'].$reg_dir;
            $vkey = get_specific("vkey", "users", "username", $u);
            $subject = "Email Verification";
            $msg = "
            <html>
            <head>
            <title>Verify</title>
            </head>
            <body>
            <p>Click the link below to verify your account</p></br>
            <a href=\"http://$page_dir?vkey=$vkey\">Notice me senpai OwO</a>
            </body>
            </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($e,$subject,$msg, $headers);
            header('location: thanks.html');
        }
    }
    
}

function strongPassword($pwd, &$error) {

    if (strlen($pwd) < 5) {
        $error = "Password must be at least 5 characters long!";
        return 0;
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $error = "Password must include at least one number!";
        return 0;
    }

    if (!preg_match("#[A-Z]+#", $pwd)) {
        $error = "Password must include at least one uppercase letter!";
        return 0;
    }
    return 1;
}

?>

<link rel="stylesheet" href="../styles/login.css">
<link rel="shortcut icon" href="#">
<html lang="en">
	<head>
		<title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<nav class="navbar">
			<span class="open-slide">
			    <a href="#" onclick="openSlideMenu()">
					<svg width="30" height="30">
						<path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
						<path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
						<path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
					</svg>
				</a>
			</span>
			<p class="font">Senpai Haven</p>
			<!-- <ul class="navbar-nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">User</a></li>
				<li><a href="#">Log2</a></li>
			</ul> -->
		</nav>
		<div id="side-menu" class="side-nav">
			<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
			<a href="#">Home</a>
			<a href="#">User</a>
			<a href="#">Log</a>
		</div>
        <div class="login-page">
            <div class="form">
                <form class="login-form" action="" method="POST">
                    <input type="TEXT" placeholder="username" name="usr_name" required/>
                    <input type="PASSWORD" placeholder="password" name="pwd" required/>
                    <input type="PASSWORD" placeholder="repeat password" name="pwd2" required/>
                    <input type="EMAIL" placeholder="email address" name="email" required/>
                    <input type="SUBMIT" name="submit" value="Register"/>
                    <p class="message">Already registered? <a href="login.php">Sign In</a></p>
                </form>
                <!-- <form class="login-form">
                    <input type="text" placeholder="username"/>
                    <input type="password" placeholder="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="register.html">Create an account</a></p>
                </form> -->
            </div>
        </div>
        <script>
                function openSlideMenu() {
                    document.getElementById('side-menu').style.width = '250px';
                }
                function closeSlideMenu() {
                    document.getElementById('side-menu').style.width = '0';
                }
        </script>
    </body>
<center>
    <?php
        echo "<h2 style='color:white; background-color:red; width: 10%; font-size: 20;'>".$error."</h2>";
    ?>
</center>
</html>