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
			height: 130px;

		}
	</style>
</head>

<body>
	<div id="shell">
		<?php
		include 'tumblr.php/vendor/autoload.php';

		// Authenticate via API Key
		$apiKey = 'wKv7sb50y5W4XLuX1GIAKp01IyQjwggDve8VB9Nj0xT2Udc8km';
		$client = new Tumblr\API\Client($apiKey);

		// Make the request
		$options = array('type' => 'photo', 'tag' => 'turtles.io', 'limit' => 100);
		$response = $client->getBlogPosts('testudoj.tumblr.com', $options);
		echo "<pre>";
		foreach ($response->posts as $post) {
			$url = $post->photos[0]->original_size->url;
			echo "<img class='import' src=$url />";
		}
		?>
	</div>
</body>
</html>
