<?php
require("./header.php");
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
	<div class="header">
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
				<p class="header font">Senpai Haven</p>
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
	</div>

	<div class="row">
		<!-- left side -->
		<div class="column side">
			<p class="column side user">UserName</p>
			<!-- <div class="column side problock"></div> -->
			<!-- <img class="column side problock" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"> -->
			<?php get_img("2","column side problock");?>
			<br \>
		</div>

		<!-- middle -->
		<div class="column middle" style="background-color:#bbb;">
			<p class="column middle title">Title</p>
			<p class="column middle subtitle">Title Description, DATE</p>
			<img class="column middle image" src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
			<p class="column middle text">jsutafjlaj;lgkfjal;fgjl;fjgl;jsdl;ghjd;lsfjfhl;fjdsl;jghl;dsjkl;jglsdk;jglkjsdlkgjl;sdj;lgfjdsl;jgflsjgf;sjgflsjfglsjflgjsljglsdjfgljdsl</p>

			<p class="column middle title">Title</p>
			<p class="column middle subtitle">Title Description, DATE</p>
			<img class="column middle image" src="http://www.quoteambition.com/wp-content/uploads/2017/04/deep-quotes-816x545.jpg">
			<p class="column middle text">jsutafjlaj;lgkfjal;fgjl;fjgl;jsdl;ghjd;lsfjfhl;fjdsl;jghl;dsjkl;jglsdk;jglkjsdlkgjl;sdj;lgfjdsl;jgflsjgf;sjgflsjfglsjflgjsljglsdjfgljdsl</p>			
		</div>

		<!-- right side -->
		<div class="column side">
				<!-- Right -->
			<div class="column side block">
				<p class="column side title">Random</p>
				<!-- <img class="column side block img" src="https://cdn.naturettl.com/wp-content/uploads/2018/07/22005000/south-wales-best-photography-locations-17-900x600.jpg">
				<img class="column side block img" src="https://www.tom-archer.com/wp-content/uploads/2017/03/adventure-photography-tom-archer-1.jpg">
				<img class="column side block img" src="https://i.pinimg.com/originals/64/34/fd/6434fd61ffb801f0cfa14cdde0315d99.jpg">
				<img class="column side block img" src="http://blog.trover.com/wp-content/uploads/2019/10/fixedw_large_4x1.jpg"> -->
				<?php get_img("3","column side block img");?>
				<?php get_img("2","column side block img");?>
				<?php get_img("1","column side block img");?>
				<?php get_img("3","column side block img");?>
			</div>
		</div>

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
	</script>
	</body>
</html>
