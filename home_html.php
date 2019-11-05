<?php 
require("header.php");
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
					<li><a class= "over_def" href="home_html.html">Senpai Haven</a></li>
					<!-- <li><a class= "over_right" href="login.html"><button>Log-In</button></a></li> -->
					<li><a class= "over_right" href="login.html">Log-In</a></li>
					<!-- <li><a class= "over_right" href="user_page.html">User-Name</a></li> -->
					<!-- <li><a class= "over_right_img" href="user_page.html"><img class= "over_image" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"></a></li> -->
				</ul>
			</nav>
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="home_html.html">Home</a>
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
		<?php echo "<div class=\"column middle\" style=\"background-color:grey;\">"; home_img(2,1,"column middle image");?>
		<!-- <div class="column middle" style="background-color:grey;">
				<div class="column middle title">Title</div>
				<div class="column middle subtitle">Title Description, DATE</div>
				<img class="column middle image" src="http://animefanatika.co.za/afwp/wp-content/uploads/2016/01/SAO.jpg">
				<div class="column middle icons">
					<a class="icons">1
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
<!-- 			
			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://c4.wallpaperflare.com/wallpaper/733/75/579/anime-sword-art-online-yuuki-asuna-landscape-wallpaper-b856fde850b01c6870bcd10e2802645a.jpg">
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
				<input type="submit" name="Submit" value="Submit Comment" class="Submit">
			</div>

			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://img4.goodfon.com/wallpaper/nbig/1/d4/sword-art-online-art-anime-asuna-kirito-2.jpg">
			<div class="column middle icons">
				<a class="icons">
					<i class="fa fa-thumbs-up w3-hover-opacity"></i>
					<i class="fa fa-comments w3-hover-opacity" onclick="openDropComment_3()"></i>
				</a>
			</div>
			<div id="comment-box_3" class="column middle comment_container">
				<a class="c-btn-close" onclick="openCloseComment_3()">&times;</a>
				<br />
				<label> Comment: <br>
					<textarea name="Comment" class="Input comment-box" required></textarea>
				</label>
				<br />
				<input type="submit" name="Submit" value="Submit Comment" class="Submit">
			</div>

			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://www.pixelstalk.net/wp-content/uploads/2016/10/Free-HD-Asuna-Backgrounds.jpg">
			<div class="column middle icons">
				<a class="icons">
					<i class="fa fa-thumbs-up w3-hover-opacity"></i>
					<i class="fa fa-comments w3-hover-opacity" onclick="openDropComment_4()"></i>
				</a>
			</div>
			<div id="comment-box_4" class="column middle comment_container">
				<a class="c-btn-close" onclick="openCloseComment_4()">&times;</a>
				<br />
				<label> Comment: <br>
					<textarea name="Comment" class="Input comment-box" required></textarea>
				</label>
				<br />
				<input type="submit" name="Submit" value="Submit Comment" class="Submit">
			</div>

			<div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="https://ih1.redbubble.net/image.354870297.9558/stf,small,600x600-pad,750x1000,f8f8f8.u3.jpg">
			<div class="column middle icons">
				<a class="icons">
					<i class="fa fa-thumbs-up w3-hover-opacity"></i>
					<i class="fa fa-comments w3-hover-opacity" onclick="openDropComment_5()"></i>
				</a>
			</div>
			<div id="comment-box_5" class="column middle comment_container">
				<a class="c-btn-close" onclick="openCloseComment_5()">&times;</a>
				<br />
				<label> Comment: <br>
					<textarea name="Comment" class="Input comment-box" required></textarea>
				</label>
				<br />
				<input type="submit" name="Submit" value="Submit Comment" class="Submit">
			</div> -->


			<!-- <div class="column middle title">Title</div>
			<div class="column middle subtitle">Title Description, DATE</div>
			<img class="column middle image" src="http://www.quoteambition.com/wp-content/uploads/2017/04/deep-quotes-816x545.jpg">
			<div class="column middle comment">jsutafjlaj;lgkfjal;fgjl;fjgl;jsdl;ghjd;lsfjfhl;fjdsl;jghl;dsjkl;jglsdk;jglkjsdlkgjl;sdj;lgfjdsl;jgflsjgf;sjgflsjfglsjflgjsljglsdjfgljdsl</div>			 -->

			<br \>
			<div class="column middle pager">
				<button>prev</button>
				<button>next</button>
				<p>gello</p>
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