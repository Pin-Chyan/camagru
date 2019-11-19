<?php 		
	require("header.php");
	session_start();
	if (!empty($_SESSION['user_id'])) {
		$name = $_SESSION['user_id'];
		$img = get_userimg($_SESSION['user_id']);
	} else {
		header('location: ./login/login.php');
	}
	$userid = get_specific("id","users","username",$_SESSION['user_id']);
?>
<link rel="stylesheet" href="./styles/editor.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSS Template</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="#">
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
					<li><a class= "over_def" href="index.php">Senpai Haven</a></li>
					<a href="login/logout.php" style="color: white; float: right;">Log-Out</a>
					<li><a class= "over_right" href="user_page.php"><?= $name ?></a></li>
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
			<div class="column side c">
				<?php get_editor_image($userid);?>
			</div>
			<!-- left side end -->

				<!-- middle -->
			<div class="column middle c">
				<div class="column middle block">
					<br />
					<br />
					<br />
							
					<!-- Stream video via webcam -->
					<div class="webcam">
						<video id = "video" playsinline autoplay></video>
					</div>
			
					<br />

					<!-- Triigger canvas web API -->
					<!-- <div class="controller">
						<button id="snap">Capture</button>
					</div> -->
				
					<!-- Webcam video snapshot -->
					<div class="canvas_photo">
						<canvas id="canvas" width="640" height="480"></canvas>
					</div>
		
					<div class="column middle block buttons">
						<p>Webcam use</p>
						<button id="snap" class="btn">Capture</button>
						<button onclick="XHR()" id="btnDisplay" class="btn" >Post</button>
						<button onclick="loadState()" class="btn" >Restore</button>
						<p>Image upload</p>
						<!-- <button type="button" onclick="ajax_upload()">upload</button> -->
						<form method="post" enctype="multipart/form-data">
							<input type="file" name="imagefile" id="imageLoader" class="btn">
						</form>
					</div>	
				</div>	
			</div>	
		<!-- middle end -->

		<!-- right side -->
		<div class="column side c">		
			<img class="stickers" src="./stickers/miku.png" onclick="miku()">
			<img class="stickers" src="./stickers/sao.png" onclick="sao()">
			<img class="stickers" src="./stickers/naruto.png" onclick="naruto()">
			<img class="stickers" src="./stickers/coffee.png" onclick="coffee()">
			<img class="stickers" src="./stickers/cute.png" onclick="cute()">
			<img class="stickers" src="./stickers/nani.png" onclick="nani_1()">
			<img class="stickers" src="./stickers/nani_2.png" onclick="nani_2()">
			<img class="stickers" src="./stickers/ears.png" onclick="ears()">
			<img class="stickers" src="./stickers/borders.png" onclick="border_1()">
			<img class="stickers" src="./stickers/trick.png" onclick="trick()">
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
	</body>
	<script>



		function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
		}
		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
		}

		'user strict';

		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');
		const snap = document.getElementById('snap');
		const btnDisplay = document.getElementById('btnDisplay');
		const btnDownload = document.getElementById('btnDownload');
		const errorMsgElement = document.getElementById('span#ErrorMsg');
		var capture = 0;
		const constraints = {
			// audio: true,
			video: {
				width: 640, height: 480
			}
		};

		// Access webcam
		async function init() {
			try {
				const stream = await navigator.mediaDevices.getUserMedia(constraints);
				handleSuccess(stream);
			}
			catch(e){
				errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
			}
		}

		// Success
		function handleSuccess(stream){
			window.stream = stream;
			video.srcObject = stream;
		}

		// Load init
		init();

		// Draw image
		var context = canvas.getContext('2d');
			width = 640;
			height = 480;
		var img = new Image;
		var	s_canvas;
		snap.addEventListener("click",function(){
			capture = 1;
			context.save();
			context.scale(-1, 1);
			context.drawImage(video, 0, 0, width * -1, height);
			context.restore();
			saveState(canvas);
		});

		function miku() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/miku.png";
				context.drawImage(drawing,320,200, 320, 280);
			}
		}

		function sao() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/sao.png";
				context.drawImage(drawing,320,200, 320, 280);
			}
		}

		function naruto() {
			if (capture == 1){
				drawing = new Image(); 
				drawing.src = "./stickers/naruto.png"; 
				context.drawImage(drawing,320,200, 320, 280);
			}
		}

		function coffee() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/coffee.png";
				context.drawImage(drawing, 270, 80, 370, 400);
			}
		}

		function cute() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/cute.png"; // 640 / 480
				context.drawImage(drawing, 0, 30, 300, 450);
			}
		}


		function nani_1() {
			if (capture == 1){
				drawing = new Image(); 
				drawing.src = "./stickers/nani.png"; // 640 / 480
				context.drawImage(drawing, 20, 300, 600, 160);
			}
		}

		function nani_2() {
			if (capture == 1){
			drawing = new Image();
			drawing.src = "./stickers/nani_2.png"; // 640 / 480
			context.drawImage(drawing, 310, 240, 320, 280);
			}
		}

		function ears() {
			if (capture == 1){
				drawing = new Image(); 
				drawing.src = "./stickers/ears.png";  // 640 / 480
				context.drawImage(drawing, 160, 30, 320, 240);
			}
		}

		function border_1() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/borders.png";  // 640 / 480
				context.drawImage(drawing, 0, 0, 640, 480);
			}
		}

		function trick() {
			if (capture == 1){
				drawing = new Image();
				drawing.src = "./stickers/trick.png"; // 640 / 480
				context.drawImage(drawing, 0, 0, 150, 200);
			}
		}


		btnDisplay.addEventListener("click", function () {
			const dataURI = canvas.toDataURL('image/jpeg', 1.0);

			// console.log(dataURI);
		});

		function wait(ms){
   			var start = new Date().getTime();
   			var end = start;
   			while(end < start + ms) {
     			end = new Date().getTime();
  			}
		}

		function XHR()
		{
			if (capture == 1){
				// build the request object and actions
				img = canvas.toDataURL('image/jpeg', 1.0);
				// console.log(img);
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "api/posts.php");
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var str = "action=upload&sub_action=canvas&img=" + img;
				xhttp.send(str);
				wait(500);
				location.reload();
			}
		}
		
		function ajax_upload(){
			var xhr = new XMLHttpRequest();
			xhr.open('POST', "api/posts.php");
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send("action=test&img=uploaded");
		}


		var imageLoader = document.getElementById('imageLoader');

    	if (imageLoader) {
			imageLoader.addEventListener('change', handleImage, false);
		}
		// var canvas = document.getElementById('imageCanvas');
		// var ctx = canvas.getContext('2d');

		function handleImage(e){
	    var reader = new FileReader();
    	reader.onload = function(event){
        	var img = new Image();
        	img.onload = function(){
    	        // canvas.width = img.width;
        	    // canvas.height = img.height;
				capture = 1;
        	    context.drawImage(img, 0, 0, 640, 480);
        		}
        	img.src = event.target.result;
    		}
    	reader.readAsDataURL(e.target.files[0]);     
		}

		function saveState(c) {
 			s_canvas = c.toDataURL('image/jpeg', 1.0);
			//copy the data into some variable
			// console.log(s_canvas);
		}

		function loadState() {
  		//load the data from the variable and apply to canvas
			// context.clearRect(0, 0, canvas.width, canvas.height);
			if (capture == 1){
				img.onload = function() {
					context.drawImage(img, 0, 0);
				}
				img.src = s_canvas;
			}
		}


	</script>
	<?php
		$senpai = Call_onee_san();
		if (isset($_POST['submit'])) {
			if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
				echo "<br />Please Select An Image.";
			} else {
				$image = $_FILES['imagefile']['tmp_name'];
				if (isset($_SESSION['user_id'])) {
					$id = get_specific("id","users","username",$_SESSION['user_id']);
					upload_img($id , $image, "gallery");
				}
			}
		}
	?>
</html>