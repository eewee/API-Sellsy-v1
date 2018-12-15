<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// AccountPrefs
//---------------------------------------------------------------------------

$request =  array( 
		'method' => 'AccountPrefs.getStaffInfos', 
		'params' => array()
);
  
$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
