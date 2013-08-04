<?php
/**
 * A class for images that are loaded from Tumblr
 */
class TumblrImage {

	/** The url of this image */
	private $url = '';

	function __construct($url) {
		$this->url = $url;
	}

	function getImageURL() {
		return $this->url;
	}

	function render() {
		$url = $this->url;
		echo "<a class='tumblrImage' href=$url><img src=$url /></a>";
	}
}