<head>
	<link rel="icon" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=32%2C32&amp;ssl=1" sizes="32x32">
	<link rel="icon" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=192%2C192&amp;ssl=1" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=180%2C180&amp;ssl=1">
	<meta name="msapplication-TileImage" content="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=270%2C270&amp;ssl=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>How to capture picture from webcam with Webcam.js</title>
	
	<style type="text/css">
	:root .adsbygoogle
	{ display: none !important; }</style><style type="text/css">iframe[src="//s.thebrighttag.com/tag?site=yri1Ute&mode=iframe"],
	img[src="//analytics.mailmunch.co/event/?site_id=667983&widget_id=804602&event_name=views&cache=1573044480366&referrer=https%3A%2F%2Fmakitweb.com%2Fhow-to-capture-picture-from-webcam-with-webcam-js%2F&visitor_id=4b654084-2862-4809-8966-1da9039981d4"]
	{display:none !important;}</style>
</head>
<body>
    <!-- CSS -->
    <style>
    #my_camera{
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }
	</style>

	<div id="my_camera" style="width: 320px; height: 240px;"><div></div><video autoplay="autoplay" style="width: 320px; height: 240px;"></video></div>
	<input type="button" value="Take Snapshot" onclick="take_snapshot()">
	
	<!-- Webcam.min.js -->
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90,
			
		});
		Webcam.attach( '#my_camera' );
	</script>
	<!-- A button for taking snaps -->
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">

		function take_snapshot() {
			
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
	


</body>