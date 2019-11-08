<link rel="stylesheet" href="./styles/editor.css">
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
					<li><a class= "over_right" href="user_page.php">User-Name</a></li>
					<li><a class= "over_right_img" href="user_page.php"><img class= "over_image" src="https://i.pinimg.com/736x/32/d0/af/32d0afda44fb2dde8753844f9283cddc.jpg"></a></li>
				</ul>	
			</nav>	
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="home_html.php">Home</a>
				<a href="user_page.php">Profile</a>
				<a href="editor.php">Editor</a>
				<a href="login.php">Log-Out</a>
			</div>	
			<!-- </div> -->		
			
		<div class="row">
				
			<!-- right side -->
			<div class="column side c">
				<br \>
			</div>
			<!-- right side end -->

				<!-- middle -->
			<div class="column middle">
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
						<canvas id="canvas" width="640px" height="480px"></canvas>
					</div>
		
					<div class="column middle block buttons">
						<button id="snap" class="btn">Capture</button>
						<button id="upload" class="btn" >Upload</button>
						<button id="save" class="btn" >Save</button>
						<button id="post" class="btn" >Post</button>
					</div>	
				</div>	
			</div>	
		<!-- middle end -->

		<!-- right side -->
		<div class="column side c">		
			<img class="stickers" src="./stickers/miku.png" onclick="miku()">
			<img class="stickers" src="./stickers/sao.png" onclick="sao()">
			<img class="stickers" src="./stickers/naruto.png" onclick="naruto()">
			<img class="stickers" src="./stickers/guilty.png" onclick="guilty()">
			<img class="stickers" src="./stickers/coffee.png" onclick="coffee()">
			<img class="stickers" src="./stickers/cute.png" onclick="cute()">
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
		const errorMsgElement = document.getElementById('span#ErrorMsg');

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
		snap.addEventListener("click",function(){
			context.save();
			context.scale(-1, 1);
			context.drawImage(video, 0, 0, width * -1, height);
			context.restore();
		});

		// miku.addEventListener("click",function(){
		// 	drawing = new Image() 
		// 	drawing.src = "./stickers/miku.png" 
		// 	// context.drawImage(video, 0, 0, 640, 480);
		// 	context.drawImage(drawing,320,200, 320, 280);
		// });

		// naruto.addEventListener("click",function(){
		// 	drawing = new Image() 
		// 	drawing.src = "./stickers/naruto.png" 
		// 	// context.drawImage(video, 0, 0, 640, 480);
		// 	context.drawImage(drawing,320,240, 320, 240);
		// });

		// sao.addEventListener("click",function(){
		// 	drawing = new Image() 
		// 	drawing.src = "./stickers/sao.png" 
		// 	// context.drawImage(video, 0, 0, 640, 480);
		// 	context.drawImage(drawing,320,240, 320, 240);
		// });

		// guilty.addEventListener("click",function(){
		// 	drawing = new Image() 
		// 	drawing.src = "./stickers/guilty.png" 
		// 	// context.drawImage(video, 0, 0, 640, 480);
		// 	context.drawImage(drawing, 0, 240, 640, 240);
		// });


		function miku() {
			drawing = new Image() 
			drawing.src = "./stickers/miku.png" 
			context.drawImage(drawing,320,200, 320, 280);
		}

		function sao() {
			drawing = new Image() 
			drawing.src = "./stickers/sao.png" 
			context.drawImage(drawing,320,200, 320, 280);
		}

		function naruto() {
			drawing = new Image() 
			drawing.src = "./stickers/naruto.png" 
			context.drawImage(drawing,320,200, 320, 280);
		}

		function guilty() {
			drawing = new Image() 
			drawing.src = "./stickers/guilty.png" 
			context.drawImage(drawing, 0, 150, 640, 330);
		}

		function coffee() {
			drawing = new Image() 
			drawing.src = "./stickers/coffee.png" 
			context.drawImage(drawing, 270, 80, 370, 400);
		}

		function cute() {
			drawing = new Image() 
			drawing.src = "./stickers/cute.png"  // 640 / 480
			context.drawImage(drawing, 0, 30, 300, 450);
		}

	</script>
</html>