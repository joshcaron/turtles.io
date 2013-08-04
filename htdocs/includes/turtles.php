<?php

include 'tumblr.php/vendor/autoload.php';
include 'TumblrImage.php';

// Authenticate via API Key
$apiKey = 'wKv7sb50y5W4XLuX1GIAKp01IyQjwggDve8VB9Nj0xT2Udc8km';
$client = new Tumblr\API\Client($apiKey);

// Make the request
$options = array('type' => 'photo', 'tag' => 'turtles.io', 'limit' => 10);
$response = $client->getBlogPosts('testudoj.tumblr.com', $options);

// Get the images
$images = array();
foreach ($response->posts as $post) {
	$url = $post->photos[0]->original_size->url;
	$image = new TumblrImage($url);
	array_push($images, $image);
}

// Render the images
foreach ($images as $image) {
	$image->render();
}

