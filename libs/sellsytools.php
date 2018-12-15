<?php

/**
 * @desc offered dev tools
 */
class sellsyTools {
	
	/**
	 * @desc api storage, here i use SESSION, but feel free
	 * @param type $name
	 * @param type $value
	 * @return type 
	 */
	public static function storageSet($name, $value){
		$_SESSION[$name] = $value;
		return true;
	}
	
	/**
	 * @desc api storage, here i use SESSION, but feel free
	 * @param type $name
	 * @return type 
	 */
	public static function storageGet($name){
		if (isset($_SESSION[$name])){
			return $_SESSION[$name];
		} else {
			return false;
		}
	}
	
	/**
	 * @desc api storage, here i use SESSION, but feel free
	 * @param type $name 
	 */
	public static function storageUnset($name){
		if (isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		}
	}
	
	/*
	 * @desc destroy the current storage 
	 */
	public static function storageReset(){
		session_destroy();
	}
	
	/**
	 * @desc translate to timestamp
	 * @param type $date
	 * @return type 
	 */
	public static function frToTimestamp($date) {
	  list($day, $month, $year) = explode('/', $date);
	  $timestamp = mktime(0, 0, 0, $month, $day, $year);
	  return $timestamp;
	}
	
	/**
	 * display errors
	 */
	public static function showErrors(){
		if (sellsyTools::storageGet('process_error')){?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<strong>process_error detected in the api response : </strong>
				<strong>Code</strong> : <?php echo sellsyTools::storageGet('process_error')->code ?>
				<strong>Message</strong> : <?php echo sellsyTools::storageGet('process_error')->message ?>
				<strong>More</strong> : <?php echo sellsyTools::storageGet('process_error')->more ?>
			</div> 	
		<?php } 
		
		if (sellsyTools::storageGet('oauth_error')){?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<strong>oauth_error detected in the api response : </strong>
				<strong>Message</strong> : <?php echo sellsyTools::storageGet('oauth_error') ?>
			</div> 	
		<?php } 
		
		sellsyTools::storageUnset('process_error');
		sellsyTools::storageUnset('oauth_error');
	}
	
}

?>