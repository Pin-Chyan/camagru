<?php
session_start();
require_once("header.php");

if (!isset($_GET['page']))
	header("Location: ./index.php?page=1&prev_pos=0");
if (!isset($_GET['prev_pos'])){
	$page = $_GET['page'];
	if ($page < 1)
		$page = 1;
	header("Location: ./index.php?page=$page&prev_pos=0");
	// $max = count(id_arr());
	// $page = $_GET['page'];
	
	// if ($page * 5 > $max){
	// 	while ($page * 5 > $max)
	// 		$page--;
	// if ($page == 0)
	// 	$page = 1;
	// header("Location: ./index.php?page=$page&prev_pos=$page");
	// }
}
// session_start();
function sesh(){
	if (!isset($_SESSION['user_id']))
		echo "<li><a class= \"over_right\" href=\"login/login.php\">Log-In</a></li>";
	else{
		$name = $_SESSION['user_id'];
		$img = get_userimg($_SESSION['user_id']);
		echo "<a href=\"login/logout.php\" style=\"color: white; float: right;\">Log-Out</a>";
		echo "<li><a class= \"over_right\" href=\"user_page.php\">$name</a></li>";
		echo "<li><a class= \"over_right_img\" href=\"user_page.php\"><img class= \"over_image\" $img\"></a></li>";
	
	}

}
function get_pos(){
	echo $_GET['prev_pos'];
}
$imgamm = 5;
?>
<link rel="stylesheet" href="./styles/test1.css">
<!-- <link rel="stylesheet" href="./styles/icons.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSS Template</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="#">
	</head>
	<script>
		// window.onload = scroll();
	</script>
	<body onload ="scroll();">
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
					
					<?php sesh();?>
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
		<?php pager_images($imgamm,$_GET['page']);?>
		<br \>
			<div class="column middle pager">
				<button id="prev" class="btn" onclick="page_p()">prev</button>
				<a class="display" style="color:black"><?php echo $_GET['page'];?></a>
				<button id="next" class="btn" onclick="page_n()">next</button>
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
		function api(id,action,sub_action){
			xhttp = new XMLHttpRequest();
  			xhttp.open("POST", "api/api.php?id=" + id + "&action=" + action + "&sub_action=" + sub_action, true);
  			xhttp.send();  
		}
	</script>
	<script>
		<?php java_comment($imgamm,$_GET['page']);?>
		function page_p(){
			window.location.href = "<?php pager(-1,$imgamm);?>";
		}
		function page_n(){
			window.location.href = "<?php pager(1,$imgamm);?>";
		}
		function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
		}
		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
		}
		function scroll(){
			element = document.getElementById("com_<?php get_pos();?>");
			if (element != null) {
				openDropComment_<?php get_pos();?>();
				element.scrollIntoView(false);
			}
		}
	</script>
</body>
</html>
<?php

if ($_POST['Submit']) {
	
	$n = 0;
	$comment = NULL;
	while ($comment = NULL) {
		$n++;
		// $name = $_SESSION['username'];
		$comment = $_POST['Comment_'."$n"];
	}
	$img_id = $n;
	
	#Get old comments
    $old = fopen("/comment/comments.txt", "r+t");
    $old_comments = fread($old, 1024);

    #Delete everything, write down new and old comments
    $write = fopen("/comment/comments.txt", "w+");
    $string = "<br>".$comment."<br>\n".$old_comments;
    fwrite($write, $string);
    fclose($write);
	fclose($old);
	header("Location : ./index.php?page=1");
}
?>