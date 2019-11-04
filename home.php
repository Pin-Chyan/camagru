<?php

require("header.php");
$error = NULL;
session_start();

if (isset($_POST['submit']))
{
	$comment = $_POST['Comment'];
	// add_comment($_SESSION['user_id'], );
}

?>
<link rel="stylesheet" href="./styles/home.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSS Template</title>
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
					<li><a class= "over_def" href="home.html">Senpai Haven</a></li>
					<li><a class= "over_right" href="user_page.html">User-Name</a></li>
					<li><a class= "over_right_img" href="user_page.html"><img class= "over_image" src="https://www.trickscity.com/wp-content/uploads/2018/06/anonymous-dp-for-boys.jpg"></a></li>
				</ul>
			</nav>
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="old.html">Home</a>
				<a href="user_page.html">Profile</a>
				<a href="#">Editor</a>
				<a href="#">Log-Out</a>
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
				<div class="column middle title">Title</div>
				<div class="column middle subtitle">Title Description, DATE</div>
				<img class="column middle image" src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
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
				<input aciton="" method="POST" type="submit" name="submit" value="Submit Comment" class="Submit">
			</div>
			
			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://media-manager.starsinsider.com/1920/na_5a9d3e8a4b475.jpg">
			<div class="column middle icons">
				<a class="icons">
					<i class="fa fa-thumbs-up w3-hover-opacity"></i>
					<i class="fa fa-comments w3-hover-opacity" onclick="openDropComment_2()"></i>
				</a>
			</div>
			<div id="comment-box_2" class="column middle comment_container">
				<a class="c-btn-close" onclick="openCloseComment_2()">&times;</a>
				<br />
				<label> Comment: <br>
					<textarea name="Comment" class="Input comment-box" required></textarea>
				</label>
				<br />
				<input aciton="" method="POST" type="submit" name="submit" value="submit comment" class="Submit">
			</div>


			<!-- <div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="http://www.quoteambition.com/wp-content/uploads/2017/04/deep-quotes-816x545.jpg">
			<div class="column middle comment">jsutafjlaj;lgkfjal;fgjl;fjgl;jsdl;ghjd;lsfjfhl;fjdsl;jghl;dsjkl;jglsdk;jglkjsdlkgjl;sdj;lgfjdsl;jgflsjgf;sjgflsjfglsjflgjsljglsdjfgljdsl</div>			 -->
		</div>
		<!-- middle end -->

		<!-- right side -->
		<div class="column side">
				<!-- Right -->
			<div class="column side block">
				<br />
			</div>
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
		function openDropComment() {
			document.getElementById('comment-box').style.height = 'auto';
			document.getElementById('comment-box').style.visibility = 'visible';
		}
		function openCloseComment() {
			document.getElementById('comment-box').style.height = '0';
			document.getElementById('comment-box').style.visibility = 'hidden';
		}

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
		

		function openDropComment_2() {
			document.getElementById('comment-box_2').style.height = 'auto';
			document.getElementById('comment-box_2').style.visibility = 'visible';
		}
		function openCloseComment_2() {
			document.getElementById('comment-box_2').style.height = '0';
			document.getElementById('comment-box_2').style.visibility = 'hidden';
		}
	</script>
	</body>
</html>