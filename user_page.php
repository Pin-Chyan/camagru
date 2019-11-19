<?php
require("header.php");
session_start();
if (!empty($_SESSION['user_id'])) {
    $name = $_SESSION['user_id'];
	$email = get_specific('email', 'users', 'username', $name);
	$img = get_userimg($_SESSION['user_id']);
	$pref = get_specific('notify', 'users', 'username', $name);
} else {
	header('location: ./login/login.php');
}


if(array_key_exists('submit_name', $_POST)) {
	$new_name = strip_tags($_POST['new_name']);
	update_name($name, $new_name);
}

if(array_key_exists('submit_pref', $_POST)) {
	if($_POST['pref'] == 'yes') {
		$pref = 1;
		update_notify($name, $pref);
    } elseif($_POST['pref'] == 'no') {
		$pref = 0;
		update_notify($name, $pref);
    }
}

if(array_key_exists('reset_pass', $_POST)) {
	$vkey = get_specific('vkey', 'users', 'username', $name);
	$dir = $_SERVER['PHP_SELF'];
    $len = strrpos($dir, "user_page.php");
	$reg_dir = substr($dir, 0, $len);
    $reg_dir = $reg_dir."login/reset_pass.php";
	$page_dir = $_SERVER['HTTP_HOST'].$reg_dir;
	header("location: http://$page_dir?vkey=$vkey");
}

if(array_key_exists('submit_pic', $_POST)) {
	if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
		echo "</br >Image Plz";
	} else {
		$image = $_FILES['imagefile']['tmp_name'];
		if (isset($_SESSION['user_id'])) {
			$id = $_SESSION['user_id'];
			upload_img($id , $image, "users");
			header("Refresh:0");
		}
	}
}


if(array_key_exists('submit_email', $_POST)) {
	update_email($name,$email, $_POST['new_email']);
}

function update_name(&$curr_name, $new_name) {
	$id = get_specific('id', "users", 'username', $curr_name);
	$curr_name = $new_name;
	$_SESSION['user_id'] = $curr_name;
	update_specific("username", $new_name, "users", 'id', $id);
}

function update_email($name, &$curr_email, $new_email) {
	$id = get_specific('id', "users", 'username', $name);
	$curr_email = $new_email;
	update_specific("email", $new_email, "users", 'id', $id);
}

function update_notify($name, $pref) {
	$id = get_specific('id', "users", 'username', $name);
	update_specific("notify", $pref, "users", 'id', $id);
}


?>


<link rel="stylesheet" href="./styles/user_page.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Profile</title>
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
<!-- 
	<h2>CSS Template using Float</h2>
	<p>In this example, we have created a header, three unequal columns and a footer. On smaller screens, the columns will stack on top of each other.</p>
	<p>Resize the browser window to see the responsive effect.</p> 
-->
	<!-- <div class="header"> -->
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
				<ul class="navbar-nav">
					<li><a class= "over_def" href="index.php">Senpai Haven</a></li>
					<a href="login/logout.php" style="color: white; float: right;">Log-Out</a>
					<li><a class= "over_right" href="user_page.php"><?= $name?></a></li>
					<li><a class= "over_right_img" href="user_page.php"><img class= "over_image" <?= $img?>></a></li>
				</ul>
			</nav>
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="index.php">Home</a>
				<a href="user_page.php">Profile</a>
				<a href="editor.php">Editor</a>
				<a href="login/logout.php">Log-Out</a>
			</div>
	<!-- </div> -->
	
	<div class="row">
		<!-- left side -->
		<div class="column side">
			<br \>
		</div>
		<!-- left end -->
		
		<!-- middle -->
		<div class="column middle">
			<div class="column middle problock" style="height: 90%;">
				<br \>
					<div class="grid-container">
						<div class="profile_title">Profile Information</div>
						<div class="profile_image"><img class= "image_s" <?= $img?>></div>
						<div class="l_context">User-Name:</div>  
						<div class="context"><?= $name ?></div>
						<div class="l_context">E-Mail:</div>
						<div class="context"><?= $email ?></div>  
						<div class="profile_title">Edit-Details</div>
						<div class="l_context">Change User-Name:</div>
						<div class="context"><form action="" method="POST"><input type="TEXT" placeholder="new username" name="new_name" required/><input type="SUBMIT" name="submit_name" value="save"/></div></form>
						<div class="l_context">Change E-Mail:</div>
						<div class="context"><form action="" method="POST"><input type="EMAIL" placeholder="new email" name="new_email" required/><input action="" method='POST' type="SUBMIT" name="submit_email" value="save"/></div></form>
						<div class="l_context">Change Password:</div>
						<div class="context"><form action="" method="POST"><input type="SUBMIT" value="reset password" name="reset_pass"/></div></form>
						<div class="l_context">Change Profile Picture:</div>
						<div class="context"><form action="" method="POST" enctype="multipart/form-data"><input type="file" name="imagefile" required><input type="submit" name="submit_pic" value="upload"></div></form>
						<div class="l_context">Send Notification Emails:</div>
						<div class="context"><form action="" method="POST"><input type="radio" name="pref" value="yes" <?php echo ($pref)?'checked':'' ?>>Yes  <input type="radio" name="pref" value="no" <?php echo !($pref)?'checked':'' ?>>No <input type="SUBMIT" name="submit_pref" value="save"></div></form>

					</div>						  
			</div>
			<!-- <div class="column middle previous_works">Own Posts</div>
			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg">
			<div class="column middle icons">
			<a class="icons">
					<i class="fa fa-thumbs-up w3-hover-opacity"></i>
					<i class="fa fa-comments w3-hover-opacity" onclick="openDropComment()"></i>
				</a>
			</div>
			<div id="comment-box" class="column middle comment_container">
				<a class="c-btn-close" onclick="openCloseComment()">&times;</a>
				<br />
				<label> Comment: <br>
					<textarea name="Comment" class="Input comment-box" required></textarea>
				</label>
				<br />
				<input type="submit" name="Submit" value="Submit Comment" class="Submit">
			</div> -->
		</div>
		<!-- middle end -->

		<!-- right side -->
		<div class="column side">
				<!-- Right -->
				<br />
		</div>
		<!-- right end -->

	</div>
	<div class="footer">
			<p>Find us More on:</p>
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
	</div>
	<script>
		function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
		}
		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
		}
		// function openDropComment() {
		// 	document.getElementById('comment-box').style.height = 'auto';
		// 	document.getElementById('comment-box').style.visibility = 'visible';
		// }
		// function openCloseComment() {
		// 	document.getElementById('comment-box').style.height = '0';
		// 	document.getElementById('comment-box').style.visibility = 'hidden';
		// }

		// function CommentOP () {
		// 	openDropComment();
		// 	openCloseComment();
		// }

		// function openDropComment() {
		// 	document.getElementById('comment-box').style.height = 'auto';
		// 	document.getElementById('comment-box').style.visibility = 'visible';
		// 	function openCloseComment() {
		// 		document.getElementById('comment-box').style.height = '0';
		// 		document.getElementById('comment-box').style.visibility = 'hidden';
		// 	}
		// }
		

	// 	function openDropComment_2() {
	// 		document.getElementById('comment-box_2').style.height = 'auto';
	// 		document.getElementById('comment-box_2').style.visibility = 'visible';
	// 	}
	// 	function openCloseComment_2() {
	// 		document.getElementById('comment-box_2').style.height = '0';
	// 		document.getElementById('comment-box_2').style.visibility = 'hidden';
	// 	}
		</script>
	</body>
</html>