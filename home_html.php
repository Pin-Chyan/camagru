<?php 
require("header.php");
session_start();
?>
<link rel="stylesheet" href="./styles/test.css">
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
					<li><a class= "over_def" href="home_html.php">Senpai Haven</a></li>
					<!-- <li><a class= "over_right" href="login.html"><button>Log-In</button></a></li> -->
					<li><a class= "over_right" href="login.html">Log-In</a></li>
					<!-- <li><a class= "over_right" href="user_page.html">User-Name</a></li> -->
					<!-- <li><a class= "over_right_img" href="user_page.html"><img class= "over_image" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"></a></li> -->
				</ul>
			</nav>
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="home_html.php">Home</a>
				<a href="user_page.html">Profile</a>
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
		<?php pager_images(2);?>


			<!-- <div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="http://www.quoteambition.com/wp-content/uploads/2017/04/deep-quotes-816x545.jpg">
			<div class="column middle comment">jsutafjlaj;lgkfjal;fgjl;fjgl;jsdl;ghjd;lsfjfhl;fjdsl;jghl;dsjkl;jglsdk;jglkjsdlkgjl;sdj;lgfjdsl;jgflsjgf;sjgflsjfglsjflgjsljglsdjfgljdsl</div>			 -->

			<br \>
			<div class="column middle pager">
				<button id="prev" class="btn" onclick="page_p()">prev</button>
				<a class="display"><?php echo $_GET['page'];?></a>
				<button id="next" class="btn" onclick="page_n()">next</button>
			</div>	
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
		document.getElementbyId("next").addEventlistener("click", function() {
			$GLOBALS['page'] += 1;
			header(location.reload());
		});
		
		function page_p(){
			window.location.href = "http://<?php pager(-1);?>";
		}
		function page_n(){
			window.location.href = "http://<?php pager(1);?>";
		}
		function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
		}
		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
		}
		<?php java_comment(2,1);?>
	</script>
</body>
</html>
<?php
