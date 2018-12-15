<?php

class sellsyConnect_curl {
	
	private static $api_url										= "https://apifeed.sellsy.com/0/";
	
	// DEV (MICHAEL)
  private static $oauth_consumer_key				= "c23ea717a8dbf8d3fbbb48820f04c6422e74761c";
  private static $oauth_consumer_secret			= "676422607b5b8445e4c9b16c2012a0cc7fde9ff1";	
  private static $oauth_access_token				= "85cc175f4eb12d5a12b877d5ed310336520b44a5";
  private static $oauth_access_token_secret	= "42ddce929d6f75f12ab4aada3aa799b163b287d6";

  private static $instance;
	
	private $header;
	
	private function __construct() {

		$encoded_key = rawurlencode(self::$oauth_consumer_secret).'&'.rawurlencode(self::$oauth_access_token_secret);
		$oauth_params = array (
			'oauth_consumer_key' => self::$oauth_consumer_key,
			'oauth_token' => self::$oauth_access_token,
			'oauth_nonce' => md5(time()+rand(0,1000)),
			'oauth_timestamp' => time(),
			'oauth_signature_method' => 'PLAINTEXT',
			'oauth_version' => '1.0',
			'oauth_signature' => $encoded_key
		);
		$this->header = array(self::getHeaders($oauth_params), 'Expect:');

	}

	public static function load() {
		$c = __CLASS__;
		self::$instance = new $c;
		return self::$instance;
    }
	
	public function requestApi($requestSettings, $requestFile=false, $showJSON=false){

		$params = array(
			'request' => 1, 
			'io_mode' =>  'json', 
			'do_in' => json_encode($requestSettings)
		); 
    
		if($requestFile){
			$params['do_file'] = new CurlFile(
				$requestFile['tmp_name'], # complete path to the file
				$requestFile['type'], # mime type
				$requestFile['name'] # name of the file
			);
		}
		
		$options = array(
			CURLOPT_HTTPHEADER	=> $this->header,
			CURLOPT_URL			=> self::$api_url,
			CURLOPT_POST		=> 1,
			CURLOPT_POSTFIELDS	=>  $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => !preg_match("!^https!i",self::$api_url)
		);
		
		$curl = curl_init();
		curl_setopt_array($curl, $options);
		$response = curl_exec($curl);
		curl_close($curl);

		
		$back = json_decode($response);
		
		if ($showJSON){
			self::debug($back); exit;
		}
		
		if (strstr($response, 'oauth_problem')){
			sellsyTools::storageSet('oauth_error', $response);
		}
		
		if ($back->status == 'error'){
			sellsyTools::storageSet('process_error', $back->error);
		} 
		
		return $back;
		
	}
	
	public function checkApi(){
		return true;
	}
	
	public function getInfos(){
			$requestSettings = array(
			'method' => 'Infos.getInfos',
			'params' => array(),
		);
		return $this->requestApi($requestSettings);
	}
	
	public static function debug($value=NULL, $message=null) {

		$trace = debug_backtrace();
		$fichier = basename($trace[0]["file"]);
		$ligne = $trace[0]["line"];
		$print_trace = create_function('$trace','
		  unset($trace[0]);
		  $disp = null;
		  if (count($trace) > 0) {
			 $disp = "<ul class=\"caller\">";
			 foreach ($trace as $entry) {
				$disp .= "<li class=\"caller\">Call : <b>";
				if (isset($entry["class"])) {
				   $disp .= $entry["class"] . "::" . $entry["function"];
				} else {
				   $disp .= $entry["function"];
				}
				$disp .= "()</b>";
				if (isset($entry["file"])) {
				   $disp .= "<br>Into : <i>";
				   $disp .= $entry["file"];
				   $disp .= " on line " . $entry["line"];
				   $disp .= "</i>";
				}
				$disp .= "</li>";
			 }
			 $disp .= "</ul>";
		  }
		  return $disp;
		');

		$intro = '<div class="file">Into : ' . $fichier . " on line " . $ligne . "</div>";

		$disp = ''
			. PHP_EOL . '<style>'
			. PHP_EOL . 'div.Debug {text-align:left; }'
			. PHP_EOL . 'div.Debug pre {padding:10px; color:#333333; background-color:#DDDDDD; font-family: mono; font-size: 9pt; line-height:10pt;}'
			. PHP_EOL . 'div.Debug .file {color:#060606; font-style:italic; padding-bottom:5px;}'
			. PHP_EOL . 'div.Debug .message {color:#006600;}'
			. PHP_EOL . 'div.Debug .stabilo {background-color:yellow; padding-left:3px; padding-right:3px;}'
			. PHP_EOL . 'div.Debug .caller {color:#C0222A; list-style:square; margin:5px; line-height:9pt;}'
			. PHP_EOL . 'div.Debug pre strong em {color:#993300;}'
			. PHP_EOL . '/* fin styles pour Debug */'
			. PHP_EOL . '</style>'
			. PHP_EOL;

		$disp .= PHP_EOL . PHP_EOL . '<!-- START DEBUG -->' . PHP_EOL . '<div class="Debug">' . PHP_EOL . '<pre>' . PHP_EOL;

		if (is_object($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ';
			$disp .= print_r($value, true);
			$disp .= $print_trace($trace);
		} elseif (is_array($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ';
			$disp .= print_r($value, true);
			$disp .= $print_trace($trace);
		} elseif (is_bool($value)){
			$disp .= $intro . '<span class="message">' . $message . '</span> => ' . ucfirst(gettype($value)) . PHP_EOL;
			if ($value) {
				$value = 'True'.PHP_EOL;
			} else{
				$value = 'False'.PHP_EOL;
			}
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . '}' . PHP_EOL;
			$disp .= $print_trace($trace);
		} elseif (is_null($value)){
			$disp .= $intro . '<span class="stabilo">' . $message . '</span>';
			$disp .= $print_trace($trace);
		} elseif (is_string($value) && is_file($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => File' . PHP_EOL;
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . PHP_EOL . '}' . PHP_EOL;
		} else {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ' . ucfirst(gettype($value)) . PHP_EOL;
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . PHP_EOL . '}' . PHP_EOL;
			$disp .= $print_trace($trace);
		}
		$disp .= '</pre>' . PHP_EOL . '</div>' . PHP_EOL . '<!-- END DEBUG -->' . PHP_EOL . PHP_EOL;
		echo $disp;

	}
	
	private function getHeaders($oauth) {
		$part = 'Authorization: OAuth ';
		$values = array();
		foreach ($oauth as $key => $value)
			$values[] = "$key=\"" . rawurlencode($value) . "\"";

		$part .= implode(', ', $values);
		return $part;
	}
	
}

?>
