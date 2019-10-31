<!-- <?php
// $error = NULL;

// if (isset($_POST['submit'])) {
//     $mysqli = NEW MySQLI('localhost','root','Busteristop117','camagru_test');

//     $u = $mysqli->real_escape_string($_POST['u']);
//     $p = $mysqli->real_escape_string($_POST['p']);

//     $p = md5($p);

//     $res = $mysqli->query("SELECT * FROM accounts WHERE username = '$u' AND  password = '$p' LIMIT 1");

//     if($res->num_rows != 0) {
//         $row = $res->fetch_assoc();
//         $verified = $row['verified'];
//         $email = $row['email'];
//         $date = strtotime($row['createdate']);
//         $date = date('M d Y', $date);
        
//         if ($verified == 1) {
//             //continue to login
//             echo "success";
//             header('location: index.php');
//         } else {
//             $error = "This account has not been verified yet an email has been sent to : '$email' at : '$date'";
//         }
//     } else {
//         $error = "You entered the wrong username or password";
//     }
// }
?> -->

<html lang="en">
<link rel="stylesheet" href="../styles/login_2.css">
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
                <form class="login-form">
                    <input type="text" placeholder="username"/>
                    <input type="password" placeholder="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>

<!-- 
    <form class="container" method="POST" action="">
        <table border="0" align="center" cellpadding="5">
            <tr>
            <td class="h_font" align="right">Username:</td>
            <td><input type="TEXT" name="u" required></td>
            </tr>
            <tr>
                <td class="h_font" align="right">Password:</td>
                <td><input type="PASSWORD" name="p" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Login" required/></td>
            </tr>
    </table>
</form> -->
<!-- <center>
    <?php
        echo $error;
    ?>
</center> -->
</body>