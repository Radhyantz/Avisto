<?php
error_reporting(0);
require("randomua.class.php");

class autovisitor extends Random_UA {

	public function __construct($url) {
		$this->url = $url;
	}

	private function curl() {
		$ch = curl_init();
		CURL_SETOPT($ch, CURLOPT_URL, $this->url);
		CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('Referer: '.$this->acakReferer(),
												   'User-Agent: '.$this->generate()));
		CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION, true);
		CURL_SETOPT($ch, CURLOPT_SSL_VERIFYHOST, 0);
		CURL_SETOPT($ch, CURLOPT_SSL_VERIFYPEER, 0);
		CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, 1);
		CURL_SETOPT($ch, CURLOPT_USERAGENT, $this->generate());
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	private function xflush() {
    	static $output_handler = null;
    	if ($output_handler === null) {
        	$output_handler = @ini_get('output_handler');
    	}
    	if ($output_handler == 'ob_gzhandler') {
        	return;
    	}
    	flush();
    	if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {
       		@ob_flush();
    	} else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {
       		@ob_end_flush();
        	@ob_start();
    	}
	}

	private function acakReferer() {
		$list = array();
		/* Asal traffic yang di submit */
			
			
		$list[] = "https://m.facebook.com";
		
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
		$list[] = "https://m.facebook.com";
 		
		


		$acak = array_rand($list,1);
		return $list[$acak];
	}

	public function jalankan() {
		$this->xflush();

		$this->curl();
		return $this->acakReferer(); 

		$this->xflush();
	}

}
?>