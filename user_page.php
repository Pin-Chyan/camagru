<?php
require("header.php");
session_start();
if (!empty($_SESSION['user_id'])) {
    $name = $_SESSION['user_id'];
    $email = get_specific('email', 'users', 'username', $name);
}
?>


<link rel="stylesheet" href="./styles/user_page.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<li><a class= "over_def" href="home_html.html">Senpai Haven</a></li>
					<li><a class= "over_right" href="user_page.php">User-Name</a></li>
					<li><a class= "over_right_img" href="user_page.php"><img class= "over_image" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"></a></li>
				</ul>
			</nav>
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="home_html.php">Home</a>
				<a href="user_page.php">Profile</a>
				<a href="editor.html">Editor</a>
				<a href="login.html">Log-Out</a>
			</div>
	<!-- </div> -->
	
	<div class="row">
		<!-- left side -->
		<div class="column side">
			<br \>
		</div>
		<!-- left end -->
		
		<!-- middle -->
		<div class="column middle" style="background-color:grey;">
			<div class="column middle problock" style="height: 90%;">
				<br \>
					<div class="grid-container">
						<div class="profile_title">Profile Information</div>
						<div class="profile_image"><img class= "image_s" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"></div>
						<div class="l_context">User-Name:</div>  
						<div class="context"><?= $name ?></div>
						<div class="l_context">E-Mail:</div>
						<div class="context"><?= $email ?></div>  
						<div class="profile_title">Edit-Details</div>
						<div class="l_context">Change User-Name:</div>
						<div class="context"><input type="TEXT" placeholder="new username" name="new_name"/><input type="SUBMIT" name="update_name" value="update"/></div>
						<div class="l_context">Change E-Mail:</div>
						<div class="context"><input type="TEXT" placeholder="new email" name="new_email"/><input type="SUBMIT" name="update_email" value="update"/></div>
						<div class="l_context">Change Password:</div>
						<div class="context"><input type="SUBMIT" value="reset password" name="reset_pass"/></div>
						<div class="context"><div class="context"><input type="SUBMIT" value="delete account" name="delete"/></div></div>
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