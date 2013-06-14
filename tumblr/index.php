<html>
<head>
	<style type="text/css">
		body {
			background-color: #d8cda8;
		}

		#shell {
			width: 80%;
			margin: auto;
		}
		.import {
			width: 500px;
			float: left;
			margin: auto;
			background-color: #5c832f;
			padding-top: 10px;
			padding-left: 10px;
			padding-right: 10px;
			padding-bottom: 50px;
			margin-right: 10px;
			margin-bottom: 10px;

		}
	</style>
</head>

<body>
	<div id="shell">
		<?php

		include 'vendor/autoload.php';
		$consumerKey = 'wKv7sb50y5W4XLuX1GIAKp01IyQjwggDve8VB9Nj0xT2Udc8km';
		$consumerSecret = 'pQMnjEszHA5lfRCccdQV896cptkRIS6anoI2NO0jVDEPrJL6Ji';

		/* gets the data from a URL */
		function get_data($url) {
			// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => $url
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
			return $resp;
		}

		$json = json_decode(get_data('http://api.tumblr.com/v2/blog/testudoj.tumblr.com/posts/photo?api_key=wKv7sb50y5W4XLuX1GIAKp01IyQjwggDve8VB9Nj0xT2Udc8km&tag=turtles.io'));

		$photos = $json->response->posts;
		foreach ($photos as $photo) {
			$sizes = $photo->photos;
			$img_url = $sizes[0]->alt_sizes[1]->url;
			echo "<img class='import' src='" . $img_url . "' />";
		}

		?>
	</div>
</body>
</html>