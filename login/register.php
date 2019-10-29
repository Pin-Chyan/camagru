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
        if (find_specific($u, "username", "users")) {
            $error = "Username already used";
        } else if (find_specific($e, "email", "users")) {
            $error = "Email already in use";
        } else {
            //add_user($u, $e, $display, $p);
            //$vkey = get_specific("vkey", "users", "username", $u);
            //echo $vkey;
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

<link rel="stylesheet" href="../styles/login_2.css">
<script src="../styles/login.js"></script>
<html lang="en">
	<head>
		<title>Register</title>
		<meta charset="UTF-8">
		<link href="styles/custom.css" rel="stylesheet" type="text/css" />
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
        <div class="login-page" action="" method="POST">
            <div class="form">
                <form class="login-form">
                    <input type="text" placeholder="username" name="/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
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
</html>